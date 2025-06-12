<?php

declare(strict_types=1);

namespace Tests;

use App\Exception\CodeNotFoundException;
use App\Exception\InvalidUrlException;
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
        $code = $this->urlShortener->shorten("https://friv.com");
        assertEquals($this->urlShortener->getUrl($code),"https://friv.com");
    }

    public function testShortenThrowsExceptionForInvalidUrl(): void
    {
        $this->expectException(InvalidUrlException::class);
        $this->expectExceptionMessage("The URL is not valid.");
        $this->urlShortener->shorten("rejvbrevbnoerv");
    }

    public function testGetUrlThrowsExceptionForNonExistentCode(): void
    {
        $this->expectException(CodeNotFoundException::class);
        $this->expectExceptionMessage("Code not exists");
        $this->urlShortener->getUrl("nonexistentcode");
    }

    public function testSameLongUrlProducesSameCode(): void
    {
        $url = "https://friv.com";
        $code1 = $this->urlShortener->shorten($url);

        $code2 = $this->urlShortener->shorten($url);
        $this->assertSame($code1, $code2);
    }

    /**
     * @dataProvider validUrlProvider
     */
    public function testValidUrlFormats(string $url): void
    {

        try {
            $this->urlShortener->shorten($url);
            $this->expectNotToPerformAssertions();
        }catch (\Exception $e) {
            $this->fail("Expect no to throw an exception " . $e);
        }

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