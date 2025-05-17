<?php

declare(strict_types=1);

namespace App;

use App\UrlShortenerInterface;

class UrlShortener implements UrlShortenerInterface
{
    // Participants will implement this class during the challenge
    public function shorten(string $url): string
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    public function getUrl(string $code): string
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }
}