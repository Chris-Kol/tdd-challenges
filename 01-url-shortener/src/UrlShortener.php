<?php

declare(strict_types=1);

namespace App;

use App\Exception\CodeNotFoundException;
use App\Exception\InvalidUrlException;
use App\UrlShortenerInterface;

class UrlShortener implements UrlShortenerInterface
{
    private array $originalUrls = [];
    private array $shortenedUrls = [];

    // Participants will implement this class during the challenge
    public function shorten(string $url): string
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidUrlException($url);
        }
        if (\in_array($url, $this->originalUrls, true)) {
            return $this->shortenedUrls[$url];
        }
        $code = \substr(\md5($url), 0, 6);
        $this->originalUrls[$code] = $url;
        $this->shortenedUrls[$url] = $code;
        return $code;
    }

    public function getUrl(string $code): string
    {
        if (!isset($this->originalUrls[$code])) {
            throw new CodeNotFoundException($code);
        }

        return $this->originalUrls[$code];
    }
}