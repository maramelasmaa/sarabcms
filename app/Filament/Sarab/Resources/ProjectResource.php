<?php

namespace App\Filament\Sarab\Resources;

use App\Filament\Sarab\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(255),

            RichEditor::make('description')
                ->required(),

            Select::make('category')
                ->options([
                    'AI' => 'AI',
                    'Web' => 'Web',
                    'Fintech' => 'Fintech',
                    'App' => 'App',
                ])
                ->required(),

            TextInput::make('link')
                ->label('Project URL')
                ->url()
                ->nullable(),

            FileUpload::make('image')
                ->label('Project Image')
                ->image()
                ->directory('projects')
                ->disk('public')
                ->visibility('public')
                ->imagePreviewHeight('250')
                ->required()
                ->acceptedFileTypes([
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                    'image/svg+xml',
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->visibility('public')
                    ->height(60),

                TextColumn::make('title')
                    ->searchable(),

                TextColumn::make('category')
                    ->badge(),

                TextColumn::make('link')
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
