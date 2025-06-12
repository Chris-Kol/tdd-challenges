<?php

declare(strict_types=1);

namespace App;

use App\AbstractRule;

final class PasswordContainsLowercaseRule extends AbstractRule
{
    public function getKey(): string
    {
        return 'password.lowercase';
    }

    public function validate(string $value): void
    {
        if (!preg_match('/[a-z]/', $value)) {
            throw new \InvalidArgumentException('Password must contain at least one lowercase letter');
        }
    }
}