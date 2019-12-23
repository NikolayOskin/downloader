<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DownloadTaskCommandsTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_download_task_command()
    {
        $this->artisan('download:url http://yandex.ru')
            ->expectsOutput('Download task created!')
            ->assertExitCode(0);
    }

    public function test_download_task_invalid_url()
    {
        $this->artisan('download:url 123')
            ->expectsOutput('Task is not created. See error messages below:')
            ->expectsOutput('The url format is invalid.')
            ->assertExitCode(0);
    }
}
