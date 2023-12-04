name: Laravel CI/CD

on: 
    push:
        branches:
            - master

jobs:
    deploy:
        runs-on: ubunto-latest

        steps:
            - name: Checkout Repository
              uses: actions/checkout@v2
              
            - name: Set up PHP
              uses: shivammature
              with: 
                php-version: '8.1'
            
            - name: Install Dependencies
              run: composer install --no-interation --prefer-dist

            - name: Generate Application Key
              run: php artisan key:generate
            
            - name: Set Environment Variables
              run: cp .env.example .env
            
            - name: Configure Laravel
              run: php artisan config:cache
            
            - name: Run Database Migrations and Seed
              run: php artisan migrate --seed
            
            - name: Deploy to Hostinger
              uses: appleboy/ssh-action@master
              with:
                host: ftp://autopartscjce.com
                username: u693572706
                password: Autopartscjce@13
                script: |
                  cd /public_html/
                  git pull origin main
                  composer install --no-interaction --prefer-dist
                  php artisan migrate --force
                  php artisan config:cache
                  php artisan route:cache
                  php artisan view:cache