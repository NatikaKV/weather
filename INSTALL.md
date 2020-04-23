** composer install 

** php artisan migrate

** php artisan db:seed



FOR STARTING CRON WORK 

crontab -e

 Cron entries:



* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1