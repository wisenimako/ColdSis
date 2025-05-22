<?php

namespace App\Providers\Filament;

use Afsakar\FilamentOtpLogin\FilamentOtpLoginPlugin;
use App\Filament\Auth\Login;
use App\ImageProviders\BackgroundImageProvider;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Devonab\FilamentEasyFooter\EasyFooterPlugin;
use DutchCodingCompany\FilamentDeveloperLogins\FilamentDeveloperLoginsPlugin;
use Filafly\FilamentPhosphorIcons\PhosphorIcons;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
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
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use JeffersonGoncalves\Filament\WhatsappWidget\WhatsappWidgetPlugin;
use Saasykit\FilamentOops\FilamentOopsPlugin;
use ShuvroRoy\FilamentSpatieLaravelHealth\FilamentSpatieLaravelHealthPlugin;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;

class HubPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('hub')
            ->path('hub')
            ->login()
            ->darkMode(true)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->topNavigation()
//            ->maxContentWidth(MaxWidth::Large)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make()
                    ->gridColumns([
                        'default' => 1,
                        'sm' => 2,
                        'lg' => 3
                    ])
                    ->sectionColumnSpan(1)
                    ->checkboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                        'lg' => 2,
                    ])
                    ->resourceCheckboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                    ]),
                FilamentOopsPlugin::make()
                    ->addEnvironment('local', 'DEV', '#008000')
                    ->addEnvironment('test', 'TEST', '#FFA500')
                    ->addEnvironment('production', 'LIVE', '#FF0000'),
                FilamentBackgroundsPlugin::make()
                    ->showAttribution(false)
                    ->imageProvider(BackgroundImageProvider::make()),
                FilamentSpatieLaravelHealthPlugin::make()
                    ->usingPage(\App\Filament\Pages\HealthCheckResults::class),
                FilamentDeveloperLoginsPlugin::make()
                    ->enabled(app()->environment('local'))
                    ->users([
                        'Super Admin' => 'dev@coldsis.com',
                        'Staff' => 'dev+staff@coldsis.com',
                    ]),
                FilamentOtpLoginPlugin::make()
                    ->loginPage(Login::class),
                PhosphorIcons::make(),
                EasyFooterPlugin::make(),
                WhatsappWidgetPlugin::make(),

            ]);
//            ->viteTheme('resources/css/filament/hub/theme.css');
    }
}
