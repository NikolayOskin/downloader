<?php

Route::middleware('guest')->group(function () {
    Route::get('tasks', 'API\DownloadTasksController@index');
    Route::post('tasks', 'API\DownloadTasksController@store');
});
