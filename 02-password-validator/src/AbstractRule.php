<?php

declare(strict_types=1);

namespace App;

abstract class AbstractRule
{
    abstract public function getKey(): string;

    abstract public function validate(string $value): void;
}