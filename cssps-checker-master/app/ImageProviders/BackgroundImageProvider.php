<?php

namespace App\ImageProviders;

use App\Settings\BusinessInfoSettings;
use Swis\Filament\Backgrounds\Contracts\ProvidesImages;
use Swis\Filament\Backgrounds\Image;
use Swis\Filament\Backgrounds\ImageProviders\Triangles;

class BackgroundImageProvider implements ProvidesImages
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getImage(): Image
    {
        return Triangles::make()->getImage();
//
//       if ($background_type == 'random_patterns') {
//
//        } else {
//            $image = Storage::url(app(BusinessInfoSettings::class)->login_background);
//            return new Image(
//                'url("' . asset($image) . '")'
//            );
//        }
    }
}
