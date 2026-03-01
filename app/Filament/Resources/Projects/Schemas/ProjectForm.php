<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image_path')
                    ->label('Image')
                    ->image()
                    ->directory('projects')
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditor()
                    ->previewable()
                    ->openable()
                    ->required(),

                TextInput::make('title')
                    ->label('Title')
                    ->required(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->unique(ignoreRecord: true)
                    ->required(),

                Select::make('category')
                    ->label('Category')
                    ->options([
                        'App' => 'App',
                        'Web' => 'Web',
                        'Chatbot' => 'Chatbot',
                    ])
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->required(),
            ]);
    }
}
