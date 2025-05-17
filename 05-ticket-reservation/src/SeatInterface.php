<?php

declare(strict_types=1);

namespace App;

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