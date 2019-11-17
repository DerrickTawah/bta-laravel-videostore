@echo OFF

echo install composer/node_modules packages
call composer install
call npm install
call npm run dev

if NOT exist .env (
    echo create .env file
    copy .env.local .env
)
if NOT exist .htaccess (
    echo create .htaccess file
    copy htaccess-tpl .htaccess
)

echo clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo all DONE :-)
echo Dont forget to make entries for the hostname in C:\Window\System32\drivers\etc\hosts
echo and in your apache httpd-vhosts.conf file
