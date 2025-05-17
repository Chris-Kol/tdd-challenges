<?php

declare(strict_types=1);

namespace App;

interface ReservationInterface
{
    /**
     * Get the confirmation code
     * @return string The confirmation code
     */
    public function getConfirmationCode(): string;

    /**
     * Get the customer email
     * @return string The customer email
     */
    public function getCustomerEmail(): string;

    /**
     * Get the reserved seats
     * @return array<SeatInterface> The reserved seats
     */
    public function getSeats(): array;

    /**
     * Get the reservation status
     * @return string The status (CONFIRMED, CANCELED)
     */
    public function getStatus(): string;

    /**
     * Get the venue identifier
     * @return int The venue identifier
     */
    public function getVenueId(): int;

    /**
     * Cancel the reservation
     * @return void
     */
    public function cancel(): void;
}