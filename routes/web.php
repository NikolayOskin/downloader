<?php

Route::get('/', 'DownloadTasksController@index');
Route::post('/tasks', 'DownloadTasksController@store');
