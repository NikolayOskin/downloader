<?php

Route::middleware('guest')->group(function () {
    Route::post('tasks', 'API\DownloadTasksController@store');
});
