<?php

declare(strict_types=1);

namespace App;

interface SeatHoldInterface
{
    /**
     * Get the unique identifier for this seat hold
     * @return int The seat hold identifier
     */
    public function getId(): int;

    /**
     * Get the expiration time for this seat hold
     * @return \DateTimeInterface The expiration time
     */
    public function getExpirationTime(): \DateTimeInterface;

    /**
     * Get the number of seats held
     * @return int The number of seats
     */
    public function getNumberOfSeats(): int;

    /**
     * Get the customer email for this seat hold
     * @return string The customer email
     */
    public function getCustomerEmail(): string;

    /**
     * Get the specific seats being held
     * @return array<SeatInterface> The seats being held
     */
    public function getSeats(): array;

    /**
     * Check if the seat hold has expired
     * @return bool True if the seat hold has expired
     */
    public function isExpired(): bool;
}