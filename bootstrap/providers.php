<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\SarabPanelProvider::class,
    App\Providers\Filament\SaravPanelProvider::class,
    App\Providers\FilamentServiceProvider::class, // custom IP whitelist
    App\Providers\Filament\AdminPanelProvider::class, // admin theme customizations
];
