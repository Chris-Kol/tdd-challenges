<?php

declare(strict_types=1);

namespace Tests;

use App\Grid;
use App\GridInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Grid
 */
class GridTest extends TestCase
{
    private GridInterface $grid;

    protected function setUp(): void
    {
        // Initialize a 10x10 grid with obstacles at (2,2) and (5,5)
        $this->grid = new Grid(10, 10, [[2,2], [5,5]]);
    }

    /**
     * @throws \Exception
     */
    public function testValidPosition(): void
    {
        $this->assertTrue($this->grid->isValidPosition(3,3));
    }

    public function testInvalidPositionWidthOutOfBounds(): void
    {
        $this->assertFalse($this->grid->isValidPosition(11, 3));
    }

    public function testInvalidPositionHeightOutOfBounds(): void
    {
        $this->assertFalse($this->grid->isValidPosition(3, 11));
    }

    public function testIsValidPositionWhenWidthIsNegative(): void
    {
        $this->assertFalse($this->grid->isValidPosition(-1, 3));
    }

    public function testHasObstacle(): void
    {
        $this->assertTrue($this->grid->hasObstacle(2,2));
    }

    public function testNotHasObstacle(): void
    {
        $this->assertFalse($this->grid->hasObstacle(2,3));
    }

    public function testWrapPosition(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testWrapPositionLargeNumbers(): void
    {
        $this->markTestIncomplete('Implement this test');
    }
}