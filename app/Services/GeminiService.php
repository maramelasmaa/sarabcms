<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected ?string $apiKey;
    protected string $url;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.key');


        $this->url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$this->apiKey}";
    }

    public function generate(string $userMessage): string
    {
        if (empty($this->apiKey)) {
            Log::error('Gemini Service: API Key is missing.');
            return "Assistant configuration error.";
        }

        $systemPrompt = "You are Sarab Tech AI assistant for a professional software company.
                         Understand Arabic and English. Reply in the same language as the user.
                         Focus on Web/App Dev, AI, and Smart Systems. Be concise.";

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(30)->post($this->url, [
                "contents" => [
                    [
                        "role" => "user",
                        "parts" => [
                            ["text" => "System Instructions: " . $systemPrompt],
                            ["text" => "User Query: " . $userMessage]
                        ]
                    ]
                ],
                "generationConfig" => [
                    "temperature" => 0.7,
                    "maxOutputTokens" => 800,
                ]
            ]);

            if ($response->failed()) {
                Log::error('Gemini API Error', [
                    'status' => $response->status(),
                    'error' => $response->json()
                ]);
                return "I'm having trouble connecting right now. Please try again.";
            }

            $data = $response->json();

            return $data['candidates'][0]['content']['parts'][0]['text']
                ?? "I'm sorry, I couldn't formulate a response.";

        } catch (\Exception $e) {
            Log::error('Gemini Exception: ' . $e->getMessage());
            return "The assistant is temporarily unavailable.";
        }
    }
}
