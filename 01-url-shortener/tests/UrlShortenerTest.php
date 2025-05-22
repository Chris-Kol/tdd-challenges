<?php

declare(strict_types=1);

namespace Tests;

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
        $this->urlShortener = new UrlShortener();
    }

    public function testShortenReturnsCodeOfCorrectLength(): void
    {
        $url = "https://example.com/parameter";

        $this->assertEquals(6, strlen($this->urlShortener->shorten($url)));
    }

    public function testGetUrlReturnsOriginalUrl(): void
    {
        $urlShortener = new UrlShortener();
        $originalUrl = 'https://efront.test';

        $code = $urlShortener->shorten($originalUrl);

        $result = $urlShortener->getUrl($code);

        self::assertSame($originalUrl, $result);
    }

    public function testWorksWithMultipleCodesInRandomOrder(): void
    {
        $urlShortener = new UrlShortener();
        $originalUrl1 = 'https://efront.test';
        $originalUrl2 = 'https://efront.test/foo/bar';
        $code1 = $urlShortener->shorten($originalUrl1);
        $code2 = $urlShortener->shorten($originalUrl2);

        self::assertSame($originalUrl1, $urlShortener->getUrl($code1));
        self::assertSame($originalUrl2, $urlShortener->getUrl($code2));
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