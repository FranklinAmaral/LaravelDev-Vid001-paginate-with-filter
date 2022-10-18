## Installation and configuration
To install this step, do the following in your terminal:

Clone the service into a folder
```
git clone https://github.com/FranklinAmaral/LaravelDev-Vid001-paginate-with-filter.git
```

Access the project directory
```
CD LaravelDev-Vid001-paginate-with-filter
```

Install as dependency using Composer inside project folder
```
composer installation
```

Configure the dir of database.sqlite on .env
```
DB_CONNECTION=sqlite
DB_DATABASE=laravel
DB_DATABASE=...Vid001-paginate-with-filter\database\database.sqlite
```


Run the migrations
```
php artisan migrate
```

Make a copy of the configuration file
```
linux
cp -R .env.example .env
windows
copy .env.example .env
```

Generate a key for your application
```
php artisan key: generate
```

## Starting an application
You can start the application using the command:
```
php artisan serve
```