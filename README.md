## Setup

-   Pull/Clone the Repo
-   Run `composer install` to install all php/laravel packages
-   Run `npm install` to install all npm/js packages
-   Copy the .env.example file and save as .env or run `cp .env.example .env`
-   Run `php artisan key:generate` to generate the app key
-   Setup the environment (Database and RocketApi Key) in the .env file
-   Run `php artisan migrate --seed` to create needed database tables and seed records
-   Run `php artisan storage:link` to create a storage symlink in public folder
-   Run `php artisan queue:work` to run queue (Used mainly for the mail)
-   Run `php artisan serve` to start the server
-   Run `npm run dev` to start node and run necessary packages
