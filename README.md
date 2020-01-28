# Downloader Application Test

#### Description  
You need to develop a web-application which will download particular resource by specified url. The same resources can be downloaded multiple times.
Url can be passed via web API method or with CLI command.
There should be a simple html page showing status of all jobs (for complete jobs there also should be an url to download target file). The same should be available via CLI command and web API.
It should save downloaded urls in storage configured in Laravel (local driver can be used). 

#### Requirements
- Laravel 5+
- PHP 7
- any SQL DB

#### Acceptance Criteria
- should use DB to persist task information
- should use job queue to download resources
- should use Laravel storage to store downloaded resources
- REST API method / CLI command / web page to enqueue url to download
- REST API method / CLI command / web page to view list of download tasks with statuses (pending/downloading/complete/error) and ability to download resource for completed tasks (url to resource in Laravel storage)
- unit tests
- no paging nor css is required for html page
- no authentication/authorization (no separation by users)


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

