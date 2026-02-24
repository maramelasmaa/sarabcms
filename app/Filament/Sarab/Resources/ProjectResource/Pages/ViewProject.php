<?php

namespace App\Filament\Sarab\Resources\ProjectResource\Pages;

use App\Filament\Sarab\Resources\ProjectResource;
use Filament\Resources\Pages\ViewRecord;

class ViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
