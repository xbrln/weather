<?php

declare(strict_types=1);

namespace App\Weather\Clients;

use App\Weather\Contracts\WeatherClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OpenWeatherMapClient implements WeatherClientInterface
{
    public function getWeather(string $city): array
    {
        return $this->request($city);
    }

    protected function request($city): array
    {
        $response = [
            'status' => false,
            'data' => null
        ];
        try {
            $response = $this->client()->request('GET', 'weather', $this->queryParams($city));
            $responseBody = $response->getBody();
            $response = [
                'status' => $response->getStatusCode(),
                'data' => json_decode($responseBody->getContents())
            ];
        } catch (GuzzleException $exception) {
            return $response;
        }
        return $response;
    }

    protected function client(): Client
    {
        return new Client(['base_uri' => $_ENV['OWM_BASE_URI']]);
    }

    protected function queryParams(string $city): array
    {
        return [
            'query' => [
                'q' => $city,
                'units' => $_ENV['OWM_TEMPERATURE_UNITS'],
                'APPID' => $_ENV['OWM_APP_ID']
            ]
        ];
    }
}
