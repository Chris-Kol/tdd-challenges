<?php

declare(strict_types=1);

namespace App\Exception;

class SeatHoldExpiredException extends \Exception
{
    public function __construct(int $seatHoldId, \DateTimeInterface $expirationTime, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf(
            'Seat hold %d has expired at %s',
            $seatHoldId,
            $expirationTime->format('Y-m-d H:i:s')
        );
        parent::__construct($message, $code, $previous);
    }
}
