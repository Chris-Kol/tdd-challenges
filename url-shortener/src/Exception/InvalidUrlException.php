<?php

declare(strict_types=1);

namespace App\Exception;

class InvalidUrlException extends \Exception
{
    public function __construct(string $url, string $reason = "", int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Invalid URL format: "%s"', $url);

        if ($reason) {
            $message .= '. ' . $reason;
        }

        parent::__construct($message, $code, $previous);
    }
}