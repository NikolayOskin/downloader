### How to run

Here are the instructions of running the application using [Laradock](https://laradock.io/) environment based on Docker.
Docker should be installed on your system.


1. ```git clone https://github.com/NikolayOskin/downloader.git && cd downloader```
2. ```git submodule add https://github.com/NikolayOskin/laradock.git```
3. ```cp .env.example .env && cp .env.laradock ./laradock/.env```
4. ```cd laradock && docker-compose up -d nginx mysql workspace```
5. Enter the workspace container ```docker-compose exec --user laradock workspace bash```
6. Run (inside the workspace container):  
```composer install```  
```php artisan key:generate && php artisan storage:link```  
```php artisan migrate```
7. Run tests (inside the workspace container): ```./vendor/bin/phpunit```
8. Exit the workspace container ```exit;```  
9. Copy supervisor config ```cp ./php-worker/supervisord.d/laravel-worker.conf.example ./php-worker/supervisord.d/laravel-worker.conf```  
10. Run php-worker ```docker-compose up -d php-worker```

#### How to add download task in browser
Go to http://localhost 

#### How to use command line
Add task: ```docker-compose exec --user laradock workspace php artisan download:url {url}```  
Show tasks: ```docker-compose exec --user laradock workspace php artisan tasks:show```

#### How to use API
Store task: POST request http://localhost/api/tasks (with 'url' form-data field)  
Show tasks: GET request http://localhost/api/tasks

