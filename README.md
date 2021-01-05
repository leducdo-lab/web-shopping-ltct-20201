# Version 3: Hoàn Thiện 
# Install composer
## On Window: <a href="https://devanswers.co/install-composer-php-windows-10/">Link install</a>
## On Ubuntu and MacOS: <a href="https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04">link install</a>
# Installation

## Step 1:

Clone this repo and run on this folder

## Step 2:

```bash
cp .env.example .env
```

## Step 3: Edit the .env file

Create new database in your local database system

DB_DATABASE='your_db_name'	   (example: laravel) <br/>
DB_USERNAME='your_db_username' (example: root)<br/>
DB_PASSWORD='your_db_password' (example: secret)<br/>


## Step 4: Composer install

```bash
composer install 
```

If something wrong:
```bash
composer update
```

## Step 5: Migration

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```
## Step 6: insert data
```bash
Dùng xampp, mamp để chạy phpmyadmin, mysql
Vào database/data mở file sql.txt img.txt 
insert data vào database
```
## Step 7: Run
```bash
php artisan serve
```

Go to localhost:8000 in your browser
