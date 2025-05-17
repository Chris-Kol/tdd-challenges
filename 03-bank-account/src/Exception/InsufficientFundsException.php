<?php

declare(strict_types=1);

namespace App\Exception;

class InsufficientFundsException extends \Exception
{
    public function __construct(int $amount, int $balance, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf(
            'Insufficient funds for withdrawal. Requested: %d, Available: %d',
            $amount,
            $balance
        );
        parent::__construct($message, $code, $previous);
    }
}