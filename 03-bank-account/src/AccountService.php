<?php

declare(strict_types=1);

namespace App;

use AccountServiceInterface;
use App\Exception\InsufficientFundsException;
use App\Exception\InvalidAmountException;

class AccountService implements AccountServiceInterface
{
    /**
     * Deposit money into the account
     * @param int $amount The amount to deposit (in cents)
     * @throws InvalidAmountException If amount is not positive
     */
    public function deposit(int $amount): void
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * Withdraw money from the account
     * @param int $amount The amount to withdraw (in cents)
     * @throws InsufficientFundsException If balance is insufficient
     * @throws InvalidAmountException If amount is not positive
     */
    public function withdraw(int $amount): void
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * Print account statement
     * @return string Formatted account statement
     */
    public function printStatement(): string
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }

    /**
     * Get the current balance
     * @return int The current balance (in cents)
     */
    public function getBalance(): int
    {
        // This is just a placeholder to make the tests runnable
        throw new \Exception('Not implemented');
    }
}