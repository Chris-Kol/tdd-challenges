<?php

declare(strict_types=1);

namespace App;

use App\UrlShortenerInterface;

class UrlShortener implements UrlShortenerInterface
{
    private $urlMap = [];
    private $counter = 0;

    public function shorten(string $url): string
    {   //0-9, symbols, a-zA-Z ASCII : toString(63)//
        if (!$this->isValidUrl($url)) {
            throw new \Exception();
        }

        if (!isset($this->urlMap[$url])) {
            $this->urlMap[$url] = $this->generateCode($this->counter);
            $this->counter++;
        }

        return $this->urlMap[$url];
    }
        //url => code
    public function getUrl(string $code): string
    {
        $codeFound = false;
        foreach ($this->urlMap as $url => $searchableCode) {
            if($code === $searchableCode) {
                $codeFound = true;
                return $url;
            }
        }

        if (!$codeFound) {
            throw new \Exception();
        }
    }

    private function generateCode(int $counter): string
    {
        return str_pad((string)$counter, 6, '0', STR_PAD_LEFT);
    }

    private function isValidUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}