<?php

declare(strict_types=1);

namespace App;

final class PasswordLengthRule extends AbstractRule
{
    public function getKey(): string
    {
        return 'password.length';
    }

    public function validate(string $value): void
    {
        if (strlen($value) < 8) {
            throw new \InvalidArgumentException('Password must be at least 8 characters long');
        }
    }
}