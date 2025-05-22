<?php

namespace App\Providers;

use App\Policies\ProcessApprovalFlowPolicy;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Http\Responses\Auth\LogoutResponse;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Guava\FilamentKnowledgeBase\Filament\Panels\KnowledgeBasePanel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use RingleSoft\LaravelProcessApproval\Models\ProcessApprovalFlow;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // prevent destructive commands in production
        DB::prohibitDestructiveCommands(app()->isProduction());

        // eager load the models
        Model::automaticallyEagerLoadRelationships();

//        FilamentActivitylog::registerEntryContentEventViewResolver('myevent', 'activitylog.entries.myevent');


        Vite::macro(
            "image",
            fn(string $asset) => $this->asset("resources/images/{$asset}")
        );

        Health::checks([
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            UsedDiskSpaceCheck::new(),
            DatabaseCheck::new(),
            CpuLoadCheck::new()
                ->failWhenLoadIsHigherInTheLast5Minutes(2.0)
                ->failWhenLoadIsHigherInTheLast15Minutes(1.5),
            SecurityAdvisoriesCheck::new(),
        ]);

        Gate::before(function ($user, $ability) {
            return $user->hasRole("super_admin") ? true : null;
        });

        //        Gate::policy(MailLog::class, MailLogPolicy::class);
        // Gate::policy(UserActivity::class, UserActivityPolicy::class);

        // register the image-annotator component
        FilamentAsset::register([

            Css::make("app-styles", __DIR__ . "/../../resources/css/app.css"),


            // printjs
            Js::make("printjs", __DIR__ . "/../../resources/js/print.min.js"),
            Css::make(
                "printjs",
                __DIR__ . "/../../resources/css/print.min.css"
            ),

        ]);

        Select::configureUsing(function (Select $field) {
            $field->native(false);
        });

        DatePicker::configureUsing(function (DatePicker $field) {
            $field->native(false);
            $field->prefixIcon("phosphor-calendar");
        });

        TimePicker::configureUsing(function (TimePicker $field) {
            $field->native(false);
        });

        DateTimePicker::configureUsing(function (DateTimePicker $field) {
            $field->native(false);
            $field->seconds(false);
            $field->prefixIcon("phosphor-calendar");
        });

        CreateAction::configureUsing(function (CreateAction $action) {
            $action->slideOver()
                ->closeModalByClickingAway(false)
                ->closeModalByEscaping(false)
                ->icon('heroicon-o-plus');
        });

        EditAction::configureUsing(function (EditAction $action) {
            $action->slideOver()
                ->closeModalByClickingAway(false)
                ->closeModalByEscaping(false)
                ->icon('heroicon-o-pencil');
        });

        \Filament\Tables\Actions\EditAction::configureUsing(function (\Filament\Tables\Actions\EditAction $action) {
            $action->slideOver()
                ->closeModalByClickingAway(false)
                ->closeModalByEscaping(false)
                ->icon('heroicon-o-pencil');
        });

        ViewAction::configureUsing(function (ViewAction $action) {
            $action
                ->slideOver()
                ->closeModalByClickingAway(false)
                ->closeModalByEscaping(false);
        });

        Table::configureUsing(function (Table $table) {
            $table->paginated([10, 25, 50]);
        });

        // Events
        //        Event::listen(
        //            ApprovalNotificationEvent::class,
        //            ApprovalNotificationListener::class,
        //        );

        Vite::prefetch(concurrency: 3);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoginResponse::class, \App\Http\Responses\LoginResponse::class);
        $this->app->bind(LogoutResponse::class, \App\Http\Responses\LogoutResponse::class);
    }
}
