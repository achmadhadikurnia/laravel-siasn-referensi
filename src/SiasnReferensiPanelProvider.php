<?php

namespace Kanekescom\Siasn\Referensi;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class SiasnReferensiPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // config([
        //     'app.name' => config('siasn-referensi.name'),
        // ]);

        return $panel
            ->default()
            ->id(config('siasn-referensi.filament.id'))
            ->path(config('siasn-referensi.filament.path'))
            ->profile(isSimple: false)
            ->login()
            ->brandLogo(config('siasn-referensi.filament.brandLogo'))
            ->favicon(config('siasn-referensi.filament.favicon'))
            ->colors(config('siasn-referensi.filament.colors'))
            ->topbar(config('siasn-referensi.filament.topbar'))
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: __DIR__.'/Filament/Resources', for: 'Kanekescom\\Siasn\\Referensi\\Filament\\Resources')
            ->discoverPages(in: __DIR__.'/Filament/Pages', for: 'Kanekescom\\Siasn\\Referensi\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: __DIR__.'/Filament/Widgets', for: 'Kanekescom\\Siasn\\Referensi\\Filament\\Widgets')
            ->topbar(config('siasn-referensi.filament.topbar'))
            ->sidebarCollapsibleOnDesktop()
            ->widgets([
                //
            ])
            ->navigationGroups(config('siasn-referensi.filament.navigationGroups'))
            ->plugins([
                \ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackupPlugin::make(),
            ])
            ->spa()
            ->unsavedChangesAlerts()
            ->databaseTransactions()
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
