<?php

declare(strict_types=1);

namespace App\Exception;

class InvalidCustomerException extends \Exception
{
    public function __construct(string $email, string $reason, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Invalid customer email: %s. Reason: %s', $email, $reason);
        parent::__construct($message, $code, $previous);
    }
}