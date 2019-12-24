<?php

namespace Tests\Unit;

use App\Services\DownloaderService;
use PHPUnit\Framework\TestCase;

class DownloaderServiceTest extends TestCase
{
    protected $service;

    public function setUp() : void
    {
        parent::setUp();
        $this->service = app(DownloaderService::class);
    }

    public function test_getting_filename_from_url_without_extension()
    {
        $fileName = $this->service->getFileNameFromURL('http://yandex.ru');
        $this->assertTrue('response-body.txt' === $fileName);
    }

    public function test_getting_filename_from_url_with_extension()
    {
        $fileName = $this->service->getFileNameFromURL('https://pay.google.com/about/static/images/social/og_image.jpg');
        $this->assertTrue('og_image.jpg' === $fileName);
    }
}
