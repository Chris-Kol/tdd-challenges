<?php

declare(strict_types=1);

namespace App;

class Rover implements RoverInterface
{
    /**
     * Create a new rover at the given position and direction
     * @param GridInterface $grid The grid the rover is on
     * @param int $x Initial X coordinate
     * @param int $y Initial Y coordinate
     * @param string $direction Initial direction (N, E, S, W)
     */
    public function __construct(
        private GridInterface $grid,
        private int $x,
        private int $y,
        private string $direction
    ) {}

    /**
     * Move the rover according to a string of commands
     * @param string $commands String containing movement commands (F, B, L, R)
     * @return string The final position and direction of the rover (e.g., "2:3:N", or "2:3:N:O" if obstacle encountered)
     */
    public function execute(string $commands): string
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * Get the current position and direction of the rover
     * @return string The current position and direction (e.g., "2:3:N")
     */
    public function getPosition(): string
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }
}