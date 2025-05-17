# Mars Rover TDD Challenge (Level 4)

## Overview
In this TDD challenge, you'll implement control software for a Mars rover that navigates a grid using commands. This challenge introduces more complex domain logic, state management, and command processing.

## Requirements

1. Create a rover that can move on a grid with x,y coordinates
    - The grid origin (0,0) is at the bottom left
    - The rover has a direction (N, E, S, W) in addition to its position
    - The initial position and direction are provided when creating the rover

2. Implement the following commands:
    - 'F': Move forward one grid point in the current direction
    - 'B': Move backward one grid point (opposite to current direction)
    - 'L': Rotate left (90 degrees) without moving
    - 'R': Rotate right (90 degrees) without moving

3. Handle grid boundaries:
    - The grid is a specified size (e.g., 10x10)
    - Attempting to move beyond the grid boundaries should place the rover at the opposite edge (wrap around)
    - Example: Moving north from (5,9) on a 10x10 grid places the rover at (5,0)

4. Detect and handle obstacles:
    - Obstacles are placed at specific coordinates
    - If a command would cause the rover to move onto an obstacle, the rover should:
        - Not move to that position
        - Abort the remaining commands
        - Return the current position with 'O' appended (e.g. "2:3:N:O")

5. Process commands sequentially:
    - The rover should process a string of commands one by one
    - Report the final position and direction after all commands are processed
    - Format the position as "x:y:direction" (e.g., "1:2:N")

## Interface

The solution must implement the provided `RoverInterface` interface:

```php
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
```

Additional classes you should implement:

```php
class Rover implements RoverInterface
{
    /**
     * Create a new rover at the given position and direction
     * @param GridInterface $grid The grid the rover is on
     * @param int $x Initial X coordinate
     * @param int $y Initial Y coordinate
     * @param string $direction Initial direction (N, E, S, W)
     */
    public function __construct(GridInterface $grid, int $x, int $y, string $direction);
    
    // ... other methods from the interface
}

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
```

## Getting Started

1. Clone this repository
2. Run `composer install`
3. Run the tests with `composer test` (they should fail)
4. For active TDD, use `composer test:watch` which will automatically re-run tests when files change
5. Implement the `Rover` and `Grid` classes to make the tests pass

## TDD Process

1. Start with the simplest test (initial position reporting)
2. Add tests for basic movement (one step in each direction)
3. Implement turning left and right
4. Add tests for boundary wrapping
5. Implement obstacle detection and handling
6. Test complex command sequences

## Running Tests

The repository includes several commands to make testing easier:

- `composer test` - Run all tests once
- `composer test:watch` - Automatically run tests when code changes (great for TDD)
- `composer test:coverage` - Generate code coverage report in the `/coverage` directory

## Tips

- Consider using constants for directions and commands to avoid typos
- Commands can be processed one at a time - iterate through the command string
- Consider implementing a Position or Coordinate value object
- Use dependency injection to provide the grid to the rover
- Design for testability by keeping methods focused and avoiding side effects
- Remember to follow the Red-Green-Refactor cycle