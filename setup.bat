@echo off
echo Setting up Real Estate Platform API...

rem Create .env file if it doesn't exist
if not exist .env (
    echo Creating .env file from .env.example...
    copy .env.example .env
    
    rem Set the admin code in the .env file
    echo. >> .env
    echo # Admin Security Code >> .env
    echo ADMIN_REGISTRATION_CODE=2000 >> .env
    
    rem Generate app key
    php artisan key:generate
)

rem Run database migrations
echo Running database migrations...
php artisan migrate --force

rem Run seeders
echo Seeding database with initial data...
php artisan db:seed --force

rem Set up storage directories and symlinks
echo Setting up storage directories...
php artisan setup:storage

echo Setup complete! You can now use the Real Estate Platform API.
echo.
echo Admin credentials:
echo   Email: admin@example.com
echo   Password: Admin@123
echo   Admin Code: 2000
echo.
echo Test user credentials:
echo   Email: user@example.com
echo   Password: User@123
echo.
echo Property Manager credentials:
echo   Email: manager@example.com
echo   Password: Manager@123
echo.
echo Content Editor credentials:
echo   Email: editor@example.com
echo   Password: Editor@123
echo.
echo Support Staff credentials:
echo   Email: support@example.com
echo   Password: Support@123
echo.
pause 