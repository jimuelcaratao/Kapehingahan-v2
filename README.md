# KapeHingahan

---

## Step to run

### Locally

-   git clone
-   create db in phpmyadmin
-   composer install
-   kapehingahan_db_v2 (dbname)
-   npm install
-   npm run dev
-   php artisan migrate
-   php artisan db:seed --class=UsersTableSeeder
-   php artisan storage:link
-   php artisan route:cache
-   php artisan config:cache
-   php artisan serve

## Packages

-   Jetstream - https://jetstream.laravel.com/2.x/introduction.html
-   Socialite - composer require laravel/socialite
-   Sweetalert - https://realrashid.github.io/sweet-alert/install
-   ImageIntervention

### configured

-   env
-   session
-   file storage

### Order Status

-   Pending
-   Packing
-   Packed
-   Delivering
-   Delivered
-   Delivering

### User Roles and Accounts

Is_admin collumn

#### 0 = Customers

-   Just Create another acc default user roles

#### 1 = Admin

-   Admin 1 -
    'name' => `John Doe`,
    'email' => `johndoe@gmail.com`,
    'password' => `qweqweqwe`,

-   Admin 2 -
    'name' => `Patrick Star`,
    'email' => `patstar@gmail.com`,
    'password' => `qweqweqwe`,

#### 2 = Staff

-   Staff 1 -
    'name' => `Bart Simpson`,
    'email' => `bartsimpson@gmail.com`,
    'password' => `qweqweqwe`,
-   Staff 2 -
    'name' => `Jon Snow`,
    'email' => `jonsnow@gmail.com`,
    'password' => `qweqweqwe`,

#### 3 = Rider

-   Created by admin

## Note.

-   Update your composer and node.js for less error/and faster installations.
-   always pull/push from development brach, ignore main branch for now.
-   Don't forget to clear cache ;) sometimes that the only problem. happens to me everytime.
