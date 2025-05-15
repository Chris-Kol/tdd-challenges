<?php

declare(strict_types=1);

namespace App\Exception;

class CodeNotFoundException extends \Exception
{
    public function __construct(string $code, int $errorCode = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Code not found: "%s"', $code);
        parent::__construct($message, $errorCode, $previous);
    }
}