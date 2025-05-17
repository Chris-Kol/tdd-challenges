<?php

declare(strict_types=1);

namespace Tests;

use App\DateProviderInterface;
use App\Exception\InvalidCustomerException;
use App\Exception\InvalidSeatHoldException;
use App\Exception\NotEnoughSeatsException;
use App\Exception\ReservationNotFoundException;
use App\Exception\SeatHoldExpiredException;
use App\ReservationInterface;
use App\SeatHoldInterface;
use App\SeatInterface;
use App\TicketService;
use App\TicketServiceInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\TicketService
 */
class TicketServiceTest extends TestCase
{
    private TicketServiceInterface $ticketService;
    private DateProviderInterface $dateProvider;

    protected function setUp(): void
    {
        // TODO: Initialize your implementation here
    }

    public function testNumSeatsAvailable(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testFindAndHoldSeats(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testFindAndHoldSeatsReducesAvailability(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testFindAndHoldSeatsAssignsBestSeatsFirst(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testFindAndHoldSeatsWithNotEnoughSeats(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testFindAndHoldSeatsWithInvalidEmail(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testFindAndHoldSeatsWithMaxTicketsExceeded(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testReserveSeats(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testReserveSeatsWithExpiredHold(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testReserveSeatsWithInvalidEmail(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testReserveSeatsWithNonExistentHold(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testExpiredHoldReleasesSeats(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testGetReservation(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testGetReservationWithInvalidCode(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testCancelReservation(): void
    {
        $this->markTestIncomplete('Implement this test');
    }
}