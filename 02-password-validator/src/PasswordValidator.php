<?php

declare(strict_types=1);

namespace App;

class PasswordValidator implements PasswordValidatorInterface
{
    /**
     * Validates a password against all rules
     * @param string $password The password to validate
     * @return ValidationResult The validation result containing success status and any error messages
     */
    public function validate(string $password): ValidationResult
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * Checks if a password is valid (convenience method)
     * @param string $password The password to check
     * @return bool True if the password is valid, false otherwise
     */
    public function isValid(string $password): bool
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }
}