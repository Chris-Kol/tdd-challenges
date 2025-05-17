<?php

declare(strict_types=1);

namespace App;

class ValidationResult
{
    /**
     * @param bool $isValid Whether the password is valid
     * @param array<string> $errors List of error messages if invalid
     */
    public function __construct(
        private bool $isValid,
        private array $errors = []
    ) {}

    /**
     * @return bool Whether the password is valid
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @return array<string> List of error messages
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return bool Whether there are any errors
     */
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}