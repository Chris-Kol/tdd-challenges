<?php

declare(strict_types=1);

namespace App\Exception;

class ObstacleEncounteredException extends \Exception
{
    private int $x;
    private int $y;
    private string $direction;

    public function __construct(int $x, int $y, string $direction, int $code = 0, ?\Throwable $previous = null)
    {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;

        $message = sprintf('Obstacle encountered at position %d:%d:%s', $x, $y, $direction);
        parent::__construct($message, $code, $previous);
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function getFormattedPosition(): string
    {
        return sprintf('%d:%d:%s:O', $this->x, $this->y, $this->direction);
    }
}