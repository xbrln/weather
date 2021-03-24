#!/bin/bash

docker-compose run php vendor/bin/php-cs-fixer fix src
docker-compose run php vendor/bin/php-cs-fixer fix tests
docker-compose run php vendor/bin/ecs check src tests --config contrib/ecs.php
docker-compose run php vendor/bin/phpstan analyse --memory-limit=1G --level=5 src tests
docker-compose run php vendor/bin/phpunit --testdox tests
