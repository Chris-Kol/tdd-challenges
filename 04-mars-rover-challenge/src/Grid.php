<?php

declare(strict_types=1);

namespace App;

class Grid implements GridInterface
{
    /**
     * @var array<int, array<int, bool>> Obstacles on the grid, indexed by [x][y]
     */
    private array $obstacles = [];

    /**
     * Create a new grid with the given dimensions
     * @param int $width The width of the grid
     * @param int $height The height of the grid
     * @param array<array<int>> $obstacles Array of [x,y] coordinates with obstacles
     */
    public function __construct(
        private int $width,
        private int $height,
        array $obstacles = []
    ) {
        foreach ($obstacles as $obstacle) {
            [$x, $y] = $obstacle;
            $this->obstacles[$x][$y] = true;
        }
    }

    /**
     * Check if a position on the grid is valid (within bounds and no obstacle)
     * @param int $x X coordinate
     * @param int $y Y coordinate
     * @return bool True if the position is valid, false otherwise
     */
    public function isValidPosition(int $x, int $y): bool
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * Check if a position has an obstacle
     * @param int $x X coordinate
     * @param int $y Y coordinate
     * @return bool True if there is an obstacle at the position
     */
    public function hasObstacle(int $x, int $y): bool
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * Get the wrapped position if moving beyond grid boundaries
     * @param int $x X coordinate (may be outside the grid)
     * @param int $y Y coordinate (may be outside the grid)
     * @return array An array with the wrapped [x, y] coordinates
     */
    public function wrapPosition(int $x, int $y): array
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }
}