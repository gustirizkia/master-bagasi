## Gusti Maulana Rizkia

### Build Setup

download

```
git clone https://github.com/gustirizkia/master-bagasi.git
```

install dependency

```
composer install
```

config env

```
cp .env.example .env
```

```
php artisan key:generate
```

```
php artisan passport:install
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

#### Auth endpoints:

-   **post** `/login`
-   **post** `/register`
