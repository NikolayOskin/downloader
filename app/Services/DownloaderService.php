<?php

namespace App\Services;

use App\Models\DownloadTask;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Support\Facades\Storage;

class DownloaderService
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function download(string $url, DownloadTask $task)
    {
        $fileName = $this->getFileNameFromURL($url);
        try {
            $task->status = 'downloading';
            $task->save();
            Storage::disk('public')->put($task->id . '/' . $fileName, '');
            $this->client->request(
                'GET',
                $url,
                ['sink' => storage_path('app/public/' . $task->id . '/' . $fileName)]
            );
            $task->status = 'completed';
            $task->filepath = $task->id . '/' . $fileName;
            $task->save();
        } catch (BadResponseException $e) {
            Storage::disk('public')->delete($task->id . '/' . $fileName);
            $task->status = 'error';
            $task->save();
        }
    }

    public function getFileNameFromURL(string $url) : string
    {
        $urlInfo = parse_url($url);
        $extension = isset($urlInfo['path']) ? pathinfo($urlInfo['path'], PATHINFO_EXTENSION) : '';
        $fileName = isset($urlInfo['path']) ? pathinfo($urlInfo['path'], PATHINFO_FILENAME) : '';
        $extension = $extension === "" ? "html" : $extension;
        $fileName = $fileName === '' ? 'index' . '.' . $extension : $fileName . '.' . $extension;

        return $fileName;
    }
}