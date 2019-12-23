<?php

namespace Tests\Unit;

use App\Services\DownloaderService;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class DownloaderServiceTest extends TestCase
{
    public function test_getting_filename_from_url_without_extension()
    {
        $service = new DownloaderService(new Client());
        $fileName = $service->getFileNameFromURL('http://yandex.ru');

        $this->assertTrue('index.html' === $fileName);
    }

    public function test_getting_filename_from_url_with_extension()
    {
        $service = new DownloaderService(new Client());
        $fileName = $service->getFileNameFromURL('https://pay.google.com/about/static/images/social/og_image.jpg');

        $this->assertTrue('og_image.jpg' === $fileName);
    }
}
