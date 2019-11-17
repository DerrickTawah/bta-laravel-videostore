@echo OFF
composer install
npm install
npm run dev

if(![System.IO.File]::Exists(".env")) {
    echo "create .env file`n"
    Copy-Item ".env.local" -Destination ".env"
}
if(![System.IO.File]::Exists(".htaccess")) {
    echo "create .htaccess file`n"
    Copy-Item "htaccess-tpl" -Destination ".htaccess"
}

echo "clear all caches`n"
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo "all DONE :-)`n"
echo "Dont forget to make entries for the hostname in C:\Window\System32\drivers\etc\host`nand in your apache httpd-vhosts.conf file`n"
