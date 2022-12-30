## Gusti Maulana Rizkia

### Build Setup

download

```
git clone https://github.com/gustirizkia/master-bagasi.git
```

install dependency

```
cd master-bagasi
```

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

create database master_bagasi and run the following command

```
php artisan migrate --seed
```

publish laravel passport

```
php artisan passport:install
```

### List Endpoint

#### Base URL

```
https://dev-gusti.m-andreansaefudin.com/api/
```

#### Product endpoints:

-   **get** `/product/{slug}`
    example :

```
https://dev-gusti.m-andreansaefudin.com/api/product/voluptas-officia-eligendi-voluptate-deleniti-delectus
```

#### Cart endpoints:

-   **get** `/cart`
-   **post** `/cart`

#### Auth endpoints:

-   **post** `/login`
-   **post** `/register`

## Link Dokumentasi API

<a href="https://documenter.getpostman.com/view/19492328/2s8Z6yXswV">Link Dokumentasi API POSTMAN</a>
