<?php

declare(strict_types=1);

namespace App;

interface GridInterface
{
    /**
     * Check if a position on the grid is valid (within bounds and no obstacle)
     * @param int $x X coordinate
     * @param int $y Y coordinate
     * @return bool True if the position is valid, false otherwise
     */
    public function isValidPosition(int $x, int $y): bool;

    /**
     * Check if a position has an obstacle
     * @param int $x X coordinate
     * @param int $y Y coordinate
     * @return bool True if there is an obstacle at the position
     */
    public function hasObstacle(int $x, int $y): bool;

    /**
     * Get the wrapped position if moving beyond grid boundaries
     * @param int $x X coordinate (may be outside the grid)
     * @param int $y Y coordinate (may be outside the grid)
     * @return array An array with the wrapped [x, y] coordinates
     */
    public function wrapPosition(int $x, int $y): array;
}