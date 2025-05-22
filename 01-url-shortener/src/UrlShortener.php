<?php

declare(strict_types=1);

namespace App;

use App\UrlShortenerInterface;

class UrlShortener implements UrlShortenerInterface
{
    // Participants will implement this class during the challenge
    public function shorten(string $url): string
    {
        $hashedUrl = md5($url);
        return substr($hashedUrl,0,6);
    }

    public function getUrl(string $code): string
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }
}