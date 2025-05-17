<?php

declare(strict_types=1);

namespace App\Exception;

class ReservationNotFoundException extends \Exception
{
    public function __construct(string $confirmationCode, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Reservation not found with confirmation code: %s', $confirmationCode);
        parent::__construct($message, $code, $previous);
    }
}