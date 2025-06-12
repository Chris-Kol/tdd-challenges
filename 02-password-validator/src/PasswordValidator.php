<?php

declare(strict_types=1);

namespace App;

class PasswordValidator implements PasswordValidatorInterface
{
    private array $errors = [];
    private array $ruleStrategy;

    public function __construct()
    {
        $this->ruleStrategy = [
            new PasswordLengthRule(),
            new PasswordContainsUppercaseRule(),
            new PasswordContainsLowercaseRule(),
        ];
    }

    /**
     * Validates a password against all rules
     * @param string $password The password to validate
     * @return ValidationResult The validation result containing success status and any error messages
     */
    public function validate(string $password): ValidationResult
    {
        return new ValidationResult(
            isValid: $this->isValid($password),
            errors: $this->errors
        );
    }

    /**
     * Checks if a password is valid (convenience method)
     * @param string $password The password to check
     * @return bool True if the password is valid, false otherwise
     */
    public function isValid(string $password): bool
    {
        foreach ($this->ruleStrategy as $rule) {
            try {
                $rule->validate($password);
            } catch (\InvalidArgumentException $e) {
                $this->errors[$rule->getKey()] = $e->getMessage();
            }
        }

        return empty($this->errors);
    }
}