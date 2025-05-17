<?php

declare(strict_types=1);

namespace App\Exception;

class InvalidSeatHoldException extends \Exception
{
    public function __construct(int $seatHoldId, string $reason, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Invalid seat hold: %d. Reason: %s', $seatHoldId, $reason);
        parent::__construct($message, $code, $previous);
    }
}