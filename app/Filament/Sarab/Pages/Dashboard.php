<?php

namespace App\Filament\Sarab\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function mount(): void
    {
        // redirect users directly to the project listing instead of showing the
        // default dashboard content.
        redirect()->route('filament.sarab.resources.projects.index')->send();
    }
}
