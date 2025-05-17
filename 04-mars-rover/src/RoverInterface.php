<?php

declare(strict_types=1);

namespace App;

interface RoverInterface
{
    /**
     * Move the rover according to a string of commands
     * @param string $commands String containing movement commands (F, B, L, R)
     * @return string The final position and direction of the rover (e.g., "2:3:N", or "2:3:N:O" if obstacle encountered)
     */
    public function execute(string $commands): string;

    /**
     * Get the current position and direction of the rover
     * @return string The current position and direction (e.g., "2:3:N")
     */
    public function getPosition(): string;
}