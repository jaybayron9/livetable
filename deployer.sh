set -e

echo "Deploying application ..."

(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute)
    git pull origin master

php artisan up

echo "Application deployed!"