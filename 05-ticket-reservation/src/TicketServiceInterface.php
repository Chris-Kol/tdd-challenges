<?php

declare(strict_types=1);

namespace App;

use App\Exception\InvalidCustomerException;
use App\Exception\InvalidSeatHoldException;
use App\Exception\NotEnoughSeatsException;
use App\Exception\ReservationNotFoundException;
use App\Exception\SeatHoldExpiredException;

interface TicketServiceInterface
{
    /**
     * Create a venue with the specified dimensions
     * @param int $venueId The venue identifier
     * @param int $rows The number of rows
     * @param int $seatsPerRow The number of seats per row
     * @return void
     */
    public function createVenue(int $venueId, int $rows, int $seatsPerRow): void;

    /**
     * Find the number of seats available within the venue
     * @param int $venueId The venue identifier
     * @return int The number of available seats
     */
    public function numSeatsAvailable(int $venueId): int;

    /**
     * Find and hold the best available seats
     * @param int $venueId The venue identifier
     * @param int $numSeats The number of seats to hold
     * @param string $customerEmail Customer's email address
     * @return SeatHoldInterface The SeatHold object identifying the specific seats and expiration
     * @throws NotEnoughSeatsException If there are not enough seats available
     * @throws InvalidCustomerException If the customer email is invalid or exceeds max tickets
     */
    public function findAndHoldSeats(int $venueId, int $numSeats, string $customerEmail): SeatHoldInterface;

    /**
     * Commit seats held to a reservation
     * @param int $seatHoldId The seat hold identifier
     * @param string $customerEmail Customer's email address
     * @return string The confirmation code
     * @throws SeatHoldExpiredException If the seat hold has expired
     * @throws InvalidSeatHoldException If the seat hold does not exist or email doesn't match
     */
    public function reserveSeats(int $seatHoldId, string $customerEmail): string;

    /**
     * Look up a reservation by confirmation code
     * @param string $confirmationCode The confirmation code
     * @return ReservationInterface The reservation
     * @throws ReservationNotFoundException If the reservation is not found
     */
    public function getReservation(string $confirmationCode): ReservationInterface;
}