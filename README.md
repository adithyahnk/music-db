

# Sample Music Database 

This application is built with Laravel and TailwindCSS with MySQL.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

Tailwind is A utility-first CSS framework for rapidly building custom user interfaces.

MySQL is an open-source relational database management system.

### Installation

Clone repository
```
git clone https://github.com/adithyahnk/music-db.git
```

Switch to project Folder
```
cd music-db
```

Run Composer and NPM
```
composer install
npm install
```
Copy .env file to set DB configurations
```
cp .env.example .env
```
Generate an application key
```
php artisan key:generate
```
Run DB Migrations
```
php artisan migrate
```
Populate the DB with sample data
```
php artisan db:seed
```
Start laravel local development server
```
php artisan serve
```
