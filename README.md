
# Installation
## Prerequisite
Check if you have `redis` installed, by running command: `redis-cli`

## Install guide
Clone this project.

Run the following commands:
```
composer install
npm install
cp .env.example .env
php artisan key:generate
npm install -g laravel-echo-server
```

Then setup your database infor in `.env` to match yours

```
APP_URL=http: your domain

DB_DATABASE=your database
DB_USERNAME=your username
DB_PASSWORD=your password

BROADCAST_DRIVER=redis
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
SESSION_LIFETIME=120

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your email
MAIL_PASSWORD=your password
MAIL_ENCRYPTION=tls
```
Setup `laravel echo server`, run command
```
- laravel-echo-server init
```

Run the following commands:
```
- php artisan migrate --seed
- php artisan serve
- npm run watch
- php artisan queue:work
- laravel-echo-server start
```

