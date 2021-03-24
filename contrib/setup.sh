#!/bin/bash

# Build containers
docker-compose up --build -d

# Install dependencies
docker-compose run php composer install

# Copy git commit pre hooks
cp contrib/pre-commit .git/hooks
