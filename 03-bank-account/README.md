# Bank Account TDD Challenge (Level 3)

## Overview
In this TDD challenge, you'll implement a simple bank account service that allows deposits, withdrawals, and provides statement printing. This challenge focuses on state management, transaction tracking, and formatted output.

## Requirements

1. Create an account service that supports:
    - Depositing money into the account
    - Withdrawing money from the account
    - Printing account statements
2. Track account balance and transaction history
3. Provide statement printing in the format: `DATE | AMOUNT | BALANCE`
4. Handle invalid operations (negative amounts, withdrawing more than available balance)
5. Ensure proper date formatting in statements (YYYY-MM-DD)
6. Transactions should be recorded with the current date when they occur

## Interface

The solution must implement the provided `AccountServiceInterface` interface:

```php
interface AccountServiceInterface
{
    /**
     * Deposit money into the account
     * @param int $amount The amount to deposit (in cents)
     * @throws InvalidAmountException If amount is not positive
     */
    public function deposit(int $amount): void;
    
    /**
     * Withdraw money from the account
     * @param int $amount The amount to withdraw (in cents)
     * @throws InsufficientFundsException If balance is insufficient
     * @throws InvalidAmountException If amount is not positive
     */
    public function withdraw(int $amount): void;
    
    /**
     * Print account statement
     * @return string Formatted account statement
     */
    public function printStatement(): string;
    
    /**
     * Get the current balance
     * @return int The current balance (in cents)
     */
    public function getBalance(): int;
}
```

## Getting Started

1. Clone this repository
2. Run `composer install`
3. Run the tests with `composer test` (they should fail)
4. For active TDD, use `composer test:watch` which will automatically re-run tests when files change
5. Implement the `AccountService` class to make the tests pass

## TDD Process

1. Start with the simplest test (initial balance should be zero)
2. Implement the deposit functionality
3. Implement the withdraw functionality
4. Add validation for deposit and withdraw operations
5. Implement transaction history tracking
6. Create statement printing with proper formatting

## Running Tests

The repository includes several commands to make testing easier:

- `composer test` - Run all tests once
- `composer test:watch` - Automatically run tests when code changes (great for TDD)
- `composer test:coverage` - Generate code coverage report in the `/coverage` directory

## Tips

- Store amounts in cents (integers) to avoid floating-point precision issues
- Use a dependency injection approach for the date provider to make testing easier
- Consider using a Transaction value object to represent each transaction
- Think about how to organize statement printing (consider using a separate formatter)
- Remember to follow the Red-Green-Refactor cycle
- Consider using a mock for the current date in your tests to ensure consistent results