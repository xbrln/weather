<?php

declare(strict_types=1);

use App\Weather\Clients\OpenWeatherMapClient;
use App\Weather\Services\WeatherService;
use PHPUnit\Framework\TestCase;
use App\Weather\Factory\WeatherFactory;

final class WeatherFactoryTest extends TestCase
{
    public function testMakeService(): void
    {
        $this->assertEquals(
            WeatherFactory::MakeService(),
            new WeatherService(new OpenWeatherMapClient())
        );
    }
}
