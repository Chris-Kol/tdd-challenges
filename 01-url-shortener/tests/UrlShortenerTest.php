<?php

declare(strict_types=1);

namespace Tests;

use App\Exception\CodeNotFoundException;
use App\Exception\InvalidUrlException;
use App\UrlShortener;
use App\UrlShortenerInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\UrlShortener
 */
class UrlShortenerTest extends TestCase
{
    private UrlShortenerInterface $urlShortener;

    protected function setUp(): void
    {
        parent::setUp();
        $this->urlShortener = new UrlShortener();
    }

    public function testShortenReturnsCodeOfCorrectLength(): void
    {
        $dummyUrl = 'https://example.com';
        $shortenedUrl = $this->urlShortener->shorten($dummyUrl);
        $this->assertEquals(6, strlen($shortenedUrl), 'Shortened URL should be 6 characters long');
    }

    public function testGetUrlReturnsOriginalUrl(): void
    {
        $shortened = $this->urlShortener->shorten('https://test.com');
        $originalUrl = $this->urlShortener->getUrl($shortened);
        $this->assertEquals('https://test.com', $originalUrl);
    }

    public function testShortenThrowsExceptionForInvalidUrl(): void
    {
        $invalidUrl = 'not-a-valid-url';
        $this->expectException(InvalidUrlException::class);
        $this->expectExceptionMessage('Invalid URL format: "not-a-valid-url"');
        $this->urlShortener->shorten($invalidUrl);
    }

    public function testGetUrlThrowsExceptionForNonExistentCode(): void
    {
        $dummyOriginal = 'https://dummy.foo';
        $dummyShort = $this->urlShortener->shorten($dummyOriginal);
        $invalidCode = 'nonexistentcode';
        $this->expectException(CodeNotFoundException::class);
        $this->expectExceptionMessage('Code not found: "nonexistentcode"');
        $this->urlShortener->getUrl($invalidCode);
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