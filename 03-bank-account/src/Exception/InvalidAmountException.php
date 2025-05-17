<?php

declare(strict_types=1);

namespace App\Exception;

class InvalidAmountException extends \Exception
{
    public function __construct(int $amount, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Invalid amount: %d. Amount must be positive.', $amount);
        parent::__construct($message, $code, $previous);
    }
}