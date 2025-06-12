<?php

declare(strict_types=1);

namespace App;

use App\Exception\InsufficientFundsException;
use App\Exception\InvalidAmountException;

class AccountService implements AccountServiceInterface
{
    private int $balance = 0;

    private $statements = [];

    /**
     * Deposit money into the account
     * @param int $amount The amount to deposit (in cents)
     * @throws InvalidAmountException If amount is not positive
     */
    public function deposit(int $amount): void
    {
        if ($amount <= 0){
            throw new InvalidAmountException($amount);
        }

        $this->balance += $amount;
        $this->statements = array_merge([new Transaction($amount, $this->balance)], $this->statements);
    }

    /**
     * Withdraw money from the account
     * @param int $amount The amount to withdraw (in cents)
     * @throws InsufficientFundsException If balance is insufficient
     * @throws InvalidAmountException If amount is not positive
     */
    public function withdraw(int $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidAmountException($amount);
        }

        $newBalance = $this->balance - $amount;

        if ($newBalance < 0) {
            throw new InsufficientFundsException($amount, $this->balance);
        }

        $this->balance = $newBalance;

        $this->statements = array_merge([new Transaction(-$amount, $this->balance)], $this->statements);
    }

    /**
     * Print account statement
     * @return string Formatted account statement
     */
    public function printStatement(): string
    {
        if (empty($this->statements)) {
            return '';
        }

        $result = "DATE | AMOUNT | BALANCE\n";
        foreach ($this->statements as $statement) {
            $result .= $statement->toString();
        }

        return $result;
    }

    /**
     * Get the current balance
     * @return int The current balance (in cents)
     */
    public function getBalance(): int
    {
        return $this->balance;
    }
}