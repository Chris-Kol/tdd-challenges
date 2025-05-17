<?php

declare(strict_types=1);

namespace App;

use App\Exception\CodeNotFoundException;
use App\Exception\InvalidUrlException;

interface UrlShortenerInterface
{
    /**
     * Creates a shortened code from a long URL
     * @param string $url The URL to shorten
     * @return string The generated code (6 characters)
     * @throws InvalidUrlException If URL format is invalid
     */
    public function shorten(string $url): string;

    /**
     * Retrieves the original URL from a code
     * @param string $code The shortened code
     * @return string The original URL
     * @throws CodeNotFoundException If code doesn't exist
     */
    public function getUrl(string $code): string;
}