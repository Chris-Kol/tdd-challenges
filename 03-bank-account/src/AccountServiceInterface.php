<?php

declare(strict_types=1);


use App\Exception\InsufficientFundsException;
use App\Exception\InvalidAmountException;

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