# Ticket Reservation System TDD Challenge (Level 5)

## Overview
In this advanced TDD challenge, you'll implement a ticket reservation system that manages seat availability, reservations, and cancellations. This challenge incorporates multiple domain objects, complex business rules, and potential race conditions.

## Requirements

1. Create a system to manage seat reservations for events:
    - Support creating venues with configurable seating capacity
    - Support multiple venues, each with different seating configuration

2. Implement core ticket service functionality:
    - Find the number of seats available within a venue
    - Find and hold the best available seats for a customer
    - Reserve seats that have been previously held

3. Implement seat management features:
    - Seat holding should be temporary with configurable expiration (default: 5 minutes)
    - Allow reserving specific seats or automatically assigning best available
    - Handle cancellations and seat returns to the available pool

4. Enforce business rules:
    - Maximum tickets per customer (configurable, default: 10)
    - No double-booking of seats
    - Expired seat holds should be released automatically
    - Seats should be assigned in optimal order (front to back, center to edges)

5. Implement confirmation features:
    - Generate unique confirmation codes for reservations
    - Allow lookup of reservations by confirmation code
    - Support reservation status reporting (confirmed, expired, canceled)

## Interface

The solution must implement the provided `TicketServiceInterface` interface:

```php
interface TicketServiceInterface
{
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
```

Additional interfaces to implement:

```php
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

interface SeatInterface
{
    /**
     * Get the seat identifier
     * @return int The seat identifier
     */
    public function getId(): int;
    
    /**
     * Get the row number (1-based)
     * @return int The row number
     */
    public function getRow(): int;
    
    /**
     * Get the seat number within the row (1-based)
     * @return int The seat number
     */
    public function getSeatNumber(): int;
    
    /**
     * Get the venue identifier
     * @return int The venue identifier
     */
    public function getVenueId(): int;
    
    /**
     * Get the quality score of the seat (higher is better)
     * @return int The quality score
     */
    public function getQualityScore(): int;
}

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
```

## Getting Started

1. Clone this repository
2. Run `composer install`
3. Run the tests with `composer test` (they should fail)
4. For active TDD, use `composer test:watch` which will automatically re-run tests when files change
5. Implement the required classes to make the tests pass

## TDD Process

1. Start with the venue and seat creation
2. Implement seat availability checking
3. Add seat hold functionality
4. Implement reservation creation
5. Add validation and business rules
6. Implement cancellation and expiration handling
7. Add confirmation code generation and lookup

## Running Tests

The repository includes several commands to make testing easier:

- `composer test` - Run all tests once
- `composer test:watch` - Automatically run tests when code changes (great for TDD)
- `composer test:coverage` - Generate code coverage report in the `/coverage` directory

## Tips

- Consider using a repository pattern for seat and reservation storage
- Use dependency injection for the current time to make testing expiration easier
- Create value objects for seats, seat holds, and reservations
- Use domain events to handle expiration and other cross-cutting concerns
- Consider how to handle concurrency (multiple users booking simultaneously)
- Remember to follow the Red-Green-Refactor cycle