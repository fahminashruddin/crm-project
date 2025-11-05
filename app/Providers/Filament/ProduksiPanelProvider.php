<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ProduksiPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('produksi') // <-- ID harus 'produksi'
            ->path('produksi') // <-- URL-nya /produksi
            ->login() // <-- Buat halaman login sendiri
            ->authGuard('web')
            ->colors([
                'primary' => Color::Blue, // Warna primer untuk produksi
            ])
            ->discoverResources(in: app_path('Filament/Produksi/Resources'), for: 'App\\Filament\\Produksi\\Resources')
            ->discoverPages(in: app_path('Filament/Produksi/Pages'), for: 'App\\Filament\\Produksi\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Produksi/Widgets'), for: 'App\\Filament\\Produksi\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])

            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ]);
    }
}
