<?php

declare(strict_types=1);

namespace App\Weather\Services;

use App\Weather\Contracts\WeatherClientInterface;

class WeatherService
{
    private WeatherClientInterface $weatherClient;

    public function __construct(WeatherClientInterface $weatherClient)
    {
        $this->weatherClient = $weatherClient;
    }

    public function getTemperature(string $city)
    {
        return $this->checkResponseAndReturn($this->weatherClient->getWeather($city));
    }

    protected function checkResponseAndReturn(array $response)
    {
        if (empty($response['data'])) {
            die('something went wrong');
        }
        return $response['data']->main->temp;
    }
}
