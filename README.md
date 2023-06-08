# Car API by [Finn Groenewoud](https://github.com/F1nnG)

## About the project
I took up this project to demonstrate my skills in Laravel and PHP, and I'm excited to showcase my progress so far. While the project is still in development, I invite you to explore its current state. Your valuable feedback and bug reports are highly appreciated, as they will help me refine and enhance the project. I'm eager to hear your thoughts and make the necessary improvements accordingly.

## Installation
1. To start using this API you should clone the repo.
```bash
git clone https://github.com/F1nnG/Car-api.git
```
2. Run the composer install command.
```bash
composer install
```
3. Run the npm install command.
```bash
npm install
```
4. Copy the .env.example to .env, and configure the .env file to your liking.
```bash
cp .env.example .env
```
5. Generate a Laravel key.
```bash
php artisan key:generate
```
6. Run the migration & seeder.
```bash
php artisan migrate:fresh --seed
```

## Running a Laravel server
After you followed the installation steps you can start running a Laravel server. and access the [localhost:8000](http://localhost:8000) route.
```bash
php artisan serve
```