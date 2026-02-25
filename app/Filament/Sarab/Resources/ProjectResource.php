<?php
namespace App\Filament\Sarab\Resources;

use App\Filament\Sarab\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form  // ← public static
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image')
                ->image()
                ->acceptedFileTypes(['image/*'])
                ->directory('projects')
                ->required()
                ->columnSpanFull(),
            Forms\Components\TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($state, $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
            Forms\Components\TextInput::make('slug')->required(),
            Forms\Components\Select::make('category')
                ->options(['App' => 'App', 'Web' => 'Web', 'Chatbot' => 'Chatbot'])
                ->required(),
            Forms\Components\Textarea::make('description')
                ->required()
                ->rows(5)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table  // ← public static
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d/m/Y'),
            ])
            ->actions([  // ← FIXED: Removed extraAttributes
                Tables\Actions\Action::make('view')
                    ->label('View')
                    ->url(fn ($record) => static::getUrl('view', ['record' => $record]))
                    ->color('success'),
                Tables\Actions\EditAction::make()
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->color('danger'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
            'view' => Pages\ViewProject::route('/{record}'),
        ];
    }


}
