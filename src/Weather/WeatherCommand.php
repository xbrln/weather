<?php

declare(strict_types=1);

namespace App\Weather;

use App\Weather\Factory\WeatherFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class WeatherCommand extends Command
{
    protected function configure(): void
    {
        parent::configure();

        $this->setName('weather');

        $this->setDescription('Show weather');

        $this->addArgument('city', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cityName = $input->getArgument('city');

        $weatherService = WeatherFactory::MakeService();

        $temperature = $weatherService->getTemperature($cityName);

        printf("It is $temperature degree celsius in $cityName \n");

        return Command::SUCCESS;
    }
}
