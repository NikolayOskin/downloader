<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DownloaderWEBTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('Add task');
    }

    public function test_form()
    {
        $this->withoutMiddleware();

        $response = $this->post('/tasks', [
            'url' => 'http://yandex.ru'
        ]);

        $response->assertStatus(302);
    }
}
