<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiService;

class AiChatController extends Controller
{
    /**
     * Handle AI chat request
     */
    public function chat(Request $request, GeminiService $gemini)
    {
        // Validate incoming message
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        try {
            // Generate AI response
            $reply = $gemini->generate($validated['message']);

            return response()->json([
                'success' => true,
                'reply'   => $reply,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'reply'   => 'Sorry, something went wrong. Please try again.',
            ], 500);
        }
    }
}
