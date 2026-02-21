<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => '#ffffff', // White accents like your "Start Project" button
                'gray' => Color::Gray,
            ])
            ->darkMode(true, true) // Forces dark mode to match sarab.tech
            ->brandLogo('https://sarab.tech/public/images/media/17135578102.png')
            ->brandLogoHeight('2rem')
            ->favicon('https://sarab.tech/public/images/media/1689461139icon light.png')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources');
    }
}
