<?php

//Route::get('/', function (\GuzzleHttp\Client $client, MimeTypes $mimes) {
//    $url = 'https://pay.google.com/about/static/images/social/og_image.jpg';
//    $urlInfo = parse_url($url);
//    $ext  = pathinfo($urlInfo['path'], PATHINFO_EXTENSION);
//    $fileExt = $ext === "" ? "txt" : $ext;
//    $randomString = bin2hex(random_bytes(10));
//    $fileName = $randomString . '.' . $fileExt;
//    Storage::disk('local')->put($fileName, '');
//    $client->request('GET', $url, ['sink' => storage_path($fileName)]);
//    //$data = Storage::getMetaData($tmpFile);
//    //dd($data);
//
//
//});
//
Route::get('/', 'DownloadTasksController@index');
