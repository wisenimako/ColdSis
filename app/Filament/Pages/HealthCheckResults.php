<?php

namespace App\Filament\Pages;

use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Illuminate\Contracts\Support\Htmlable;
use ShuvroRoy\FilamentSpatieLaravelHealth\Pages\HealthCheckResults as BaseHealthCheckResults;

class HealthCheckResults extends BaseHealthCheckResults
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';


    protected static ?string $title = 'Application Health';
    protected static ?string $navigationLabel = 'Application Health';


    public static function getNavigationLabel(): string
    {
        return 'Application Health';
    }


    public function getHeading(): string|Htmlable
    {
        return 'Application Health';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Logs';
    }
}
