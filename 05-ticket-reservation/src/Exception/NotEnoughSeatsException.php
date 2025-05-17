<?php

declare(strict_types=1);

namespace App\Exception;

class NotEnoughSeatsException extends \Exception
{
    public function __construct(int $venueId, int $requested, int $available, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf(
            'Not enough seats available in venue %d. Requested: %d, Available: %d',
            $venueId,
            $requested,
            $available
        );
        parent::__construct($message, $code, $previous);
    }
}