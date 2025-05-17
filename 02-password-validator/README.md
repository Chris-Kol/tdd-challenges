# Password Validator TDD Challenge (Level 2)

## Overview
In this TDD challenge, you'll implement a password validation service that ensures passwords meet security requirements. This is a common component in authentication systems and demonstrates practical validation patterns.

## Requirements

1. Validate that passwords meet minimum security requirements:
    - At least 8 characters long
    - Contains at least one uppercase letter
    - Contains at least one lowercase letter
    - Contains at least one digit
    - Contains at least one special character (!@#$%^&*()_-+=<>?)
2. Provide specific error messages for each validation failure
3. Allow validating passwords against multiple rules at once
4. Return all validation errors in a structured format

## Interface

The solution must implement the provided `PasswordValidatorInterface` interface:

```php
interface PasswordValidatorInterface
{
    /**
     * Validates a password against all rules
     * @param string $password The password to validate
     * @return ValidationResult The validation result containing success status and any error messages
     */
    public function validate(string $password): ValidationResult;
    
    /**
     * Checks if a password is valid (convenience method)
     * @param string $password The password to check
     * @return bool True if the password is valid, false otherwise
     */
    public function isValid(string $password): bool;
}
```

And the `ValidationResult` class to return detailed validation information:

```php
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
```

## Getting Started

1. Clone this repository
2. Run `composer install`
3. Run the tests with `composer test` (they should fail)
4. For active TDD, use `composer test:watch` which will automatically re-run tests when files change
5. Implement the `PasswordValidator` class to make the tests pass

## TDD Process

1. Start with the simplest test (minimum length rule)
2. Add support for checking uppercase letters
3. Add support for checking lowercase letters
4. Add support for checking digits
5. Add support for checking special characters
6. Implement the validation result to return multiple errors
7. Create the convenience method for simple validity checking

## Running Tests

The repository includes several commands to make testing easier:

- `composer test` - Run all tests once
- `composer test:watch` - Automatically run tests when code changes (great for TDD)
- `composer test:coverage` - Generate code coverage report in the `/coverage` directory

## Tips

- Use regular expressions to check for character types
- For each validation rule, create a clear, descriptive error message
- Keep your validation rules simple and focused on a single responsibility
- Think about how to make your validator extensible for additional rules
- Remember to follow the Red-Green-Refactor cycle
- Consider using rule objects to encapsulate each validation rule (advanced)