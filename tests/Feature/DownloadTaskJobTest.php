<?php

namespace Tests\Feature;

use App\Jobs\DownloadTaskJob;
use App\Models\DownloadTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class DownloadTaskJobTest extends TestCase
{
    public function test_download_task_job_is_pushed_to_queue()
    {
        Queue::fake();

        Queue::assertNothingPushed();
        $task = new DownloadTask(['url' => 'http://yandex.ru']);
        $job = new DownloadTaskJob($task);

        Queue::push($job);
        Queue::assertPushed(DownloadTaskJob::class, 1);
    }
}
