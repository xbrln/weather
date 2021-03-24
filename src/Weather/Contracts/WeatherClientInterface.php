<?php

declare(strict_types=1);

namespace App\Weather\Contracts;

interface WeatherClientInterface
{
    public function getWeather(string $city): array;
}
