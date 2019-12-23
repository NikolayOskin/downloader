<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DownloaderAPITest extends TestCase
{
    use RefreshDatabase;

    public function test_store_download_task()
    {
        $response = $this->json(
            'POST',
            '/api/tasks',
            ['url' => 'https://pay.google.com/about/static/images/social/og_image.jpg']
        );
        $response->assertStatus(200);
    }

    public function test_store_download_task_url_validation()
    {
        $response = $this->json(
            'POST',
            '/api/tasks',
            ['url' => 'test']
        );
        $response->assertStatus(422);
    }

    public function test_store_download_task_url_without_extension()
    {
        $response = $this->json(
            'POST',
            '/api/tasks',
            ['url' => 'http://yandex.ru']
        );
        $response->assertStatus(200);
    }

    public function test_index_download_tasks()
    {
        $response = $this->json(
            'GET',
            '/api/tasks'
        );
        $response->assertStatus(200);
    }
}
