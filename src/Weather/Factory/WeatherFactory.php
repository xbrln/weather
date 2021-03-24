<?php

declare(strict_types=1);

namespace App\Weather\Factory;

use App\Weather\Clients\OpenWeatherMapClient;
use App\Weather\Services\WeatherService;

class WeatherFactory
{
    public static function MakeService(): WeatherService
    {
        return new WeatherService(new OpenWeatherMapClient());
    }
}
