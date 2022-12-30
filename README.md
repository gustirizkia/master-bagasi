## Gusti Maulana Rizkia

### Build Setup

install dependency

```
composer install
```

config env

```
php artisan key:generate
```

```
php artisan jwt:secret
```

create database master_bagasi and run the following command

```
php artisan migrate --seed
```

### List Endpoint

#### Product endpoints:

-   **get** `/product/{slug}`

#### Cart endpoints:

-   **get** `/cart`
-   **post** `/cart`
