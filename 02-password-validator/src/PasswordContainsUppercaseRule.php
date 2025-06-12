<?php

declare(strict_types=1);

namespace App;

use App\AbstractRule;

final class PasswordContainsUppercaseRule extends AbstractRule
{
    public function getKey(): string
    {
        return 'password.uppercase';
    }

    public function validate(string $value): void
    {
        if (!preg_match('/[A-Z]/', $value)) {
            throw new \InvalidArgumentException('Password must contain at least one uppercase letter');
        }
    }
}