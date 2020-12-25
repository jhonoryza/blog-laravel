# Blog
A php project blog built using framework laravel

# Package
- Laravel Breeze (auth scaffolding)
- Spatie Query Builder
- Spatie Json Paginate
- Gridjs (datatable js lib)
- Tailwindcss (css)

# Specification
- Laravel 8
- PHP 7.4
- MYSQL 8
- Redis

# Getting Started
- copy .env.example to .env
- edit file docker-compose.yml
- change ${WWWGROUP} to 1000
- change ${WWWUSER} to 1000
- run docker-compose up -d
- run docker exec -it --user=1000:1000 site composer install
- run docker-compose down
- change 1000 back to ${WWWGROUP}
- change 1000 back to ${WWWUSER}
- run vendor/bin/sail up -d
- run vendor/bin/sail artisan key:generate
- run vendor/bin/sail artisan migrate
- run vendor/bin/sail artisan db:seed
