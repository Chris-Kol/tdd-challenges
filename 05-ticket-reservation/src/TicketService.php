<?php

declare(strict_types=1);

namespace App;

use App\Exception\InvalidCustomerException;
use App\Exception\InvalidSeatHoldException;
use App\Exception\NotEnoughSeatsException;
use App\Exception\ReservationNotFoundException;
use App\Exception\SeatHoldExpiredException;

class TicketService implements TicketServiceInterface
{
    public function __construct(
        private DateProviderInterface $dateProvider
    ) {}

    /**
     * @inheritDoc
     */
    public function createVenue(int $venueId, int $rows, int $seatsPerRow): void
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function numSeatsAvailable(int $venueId): int
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function findAndHoldSeats(int $venueId, int $numSeats, string $customerEmail): SeatHoldInterface
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function reserveSeats(int $seatHoldId, string $customerEmail): string
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function getReservation(string $confirmationCode): ReservationInterface
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }
}