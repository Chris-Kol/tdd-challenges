<?php

declare(strict_types=1);

namespace Tests;

use App\UrlShortenerInterface;
use PHPUnit\Framework\TestCase;
use App\UrlShortener;
use function PHPUnit\Framework\assertEquals;
/**
 * @covers \App\UrlShortener
 */
class UrlShortenerTest extends TestCase
{
    private UrlShortenerInterface $urlShortener;

    protected function setUp(): void
    {
        // TODO: Initialize your implementation here
        $this->urlShortener = new UrlShortener();
    }

    public function testShortenReturnsCodeOfCorrectLength(): void
    {
        assertEquals(6,strlen($this->urlShortener->shorten("https://friv.com")));
    }

    public function testGetUrlReturnsOriginalUrl(): void
    {
        $hashedUrl = $this->urlShortener->shorten("https://friv.com");
        assertEquals($this->urlShortener->getUrl($hashedUrl),"https://friv.com");
    }

    public function testShortenThrowsExceptionForInvalidUrl(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testGetUrlThrowsExceptionForNonExistentCode(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testSameLongUrlProducesSameCode(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    /**
     * @dataProvider validUrlProvider
     */
    public function testValidUrlFormats(string $url): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function validUrlProvider(): array
    {
        return [
            'Simple HTTP URL' => ['http://example.com'],
            'HTTPS URL' => ['https://example.com'],
            'URL with path' => ['https://example.com/path/to/resource'],
            'URL with query string' => ['https://example.com/search?q=test&page=1'],
            'URL with fragment' => ['https://example.com/path#section'],
            'URL with port' => ['https://example.com:8080/path'],
            'URL with user info' => ['https://user:pass@example.com/path'],
            'URL with special characters' => ['https://example.com/path with spaces/and+plus/and%20encoded'],
        ];
    }
}