<?php

declare(strict_types=1);

namespace App;

use App\Exception\CodeNotFoundException;
use App\UrlShortenerInterface;
use function PHPUnit\Framework\stringContains;

/**
 * @property array $map
 */
class UrlShortener implements UrlShortenerInterface
{
    private array $map = [];
    // Participants will implement this class during the challenge
    public function shorten(string $url): string
    {
        $url = rawurldecode(rawurlencode($url));
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \App\Exception\InvalidUrlException($url, "The URL is not valid.");
        }
        $hashedUrl = md5($url);
        $code = substr($hashedUrl,0,6);
        $this->map[$code] = $url;
        return $code;
    }

    public function getUrl(string $code): string
    {
        if(!isset($this->map[$code]))
        {
            throw new CodeNotFoundException("Code not exists");
        }
        return $this->map[$code];
    }
}