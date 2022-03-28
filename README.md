# GazeCart Challenge

## Overview
  - Backend with Laravel  9.2
  - Frontend with Vue 3.2.31 and Tailwind 3.0.18

## Project setup instructions
```bash
https://github.com/nunopeixoto/grazecart-challenge.git
cd grazecart-challenge
composer install

npm install
npm run prod

# Fill GRAZECART_API_KEY on .env
cp .env.example .env
vi .env

php artisan key:generate
php artisan serve
```

## Testing
- To run both Unit and Feature tests
```bash
php artisan test
```
