<?php

namespace App\Jobs;

use App\Models\DownloadTask;
use App\Services\DownloaderService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DownloadTaskJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var DownloadTask
     */
    private $downloadTask;

    /**
     * Create a new job instance.
     *
     * @param DownloadTask $downloadTask
     */
    public function __construct(DownloadTask $downloadTask)
    {
        $this->downloadTask = $downloadTask;
    }

    /**
     * Execute the job.
     *
     * @param DownloaderService $service
     * @return void
     */
    public function handle(DownloaderService $service)
    {
        $service->download($this->downloadTask->url, $this->downloadTask);
    }
}
