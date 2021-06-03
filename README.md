# Project API Pusat Informasi Daftar Buku

Books Information System is a Open Source Books API that provides 4 endpoint API Routes
1. Book List API
2. Book Details API 
3. Book Search API
4. Book Filter by Author API

### Books
| Route  | HTTP Method   | Handler |
| ------------- | -------------  | ------------- |
| /api/v1/books/  | GET    | BookController@index  |
| /api/v1/books/{id}  | GET    | BookController@show  |
| /api/v1/books/search/{keyword}  | GET    | BookController@search  |
| /books/filter  | POST    | BookController@filter  |

Besides the endoint API, in this project also provided Author and Book CRUD Features that
needs basic authentication first.

### Database Design 
<p align="center"><img src="blob:https://mega.nz/1413005e-80f6-4047-bf4f-9cc0ad0eb14f"/></p>


## Usage
- Prerequisites
    - Code Editor / IDE
    - PHP [Composer](https://getcomposer.org/download/)

## Installation

1. Clone the repository
```bash
git clone https://github.com/rullyafrizal/api_informasi_buku.git
```

2. Use the package manager [composer](https://getcomposer.org/download/) to install vendor.

```bash
composer install
```

3. Configure .env files, => copy .env.example and rename it to .env

4. Set your database configuration in .env files

5. Run Migration 

```bash
php artisan migrate
```

6. Generate APP_KEY

```bash
php artisan key:generate
```

7. To make uploaded files accessible from the web, you should create a symbolic link from public/storage to storage/app/public.

```bash
php artisan storage:link
```

8. Run Laravel server

```bash
php artisan serve
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.


## License
[MIT](https://choosealicense.com/licenses/mit/)
