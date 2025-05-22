<?php

declare(strict_types=1);

namespace App;

use App\UrlShortenerInterface;

class UrlShortener implements UrlShortenerInterface
{
    private $urlMap = [];

    public function shorten(string $url): string
    {
        if (!isset($this->urlMap[$url])) {
            return $this->urlMap[$url];
        }
        else{
            $this->
        }
        return 'abcdef';
    }

    public function getUrl(string $code): string
    {
        return 'https://efront.test';
    }
}