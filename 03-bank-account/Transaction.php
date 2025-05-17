<?php

declare(strict_types=1);

namespace App\Model;

class Transaction
{
    public const TYPE_DEPOSIT = 'deposit';
    public const TYPE_WITHDRAWAL = 'withdrawal';

    /**
     * @param \DateTimeInterface $date The transaction date
     * @param string $type The transaction type (deposit or withdrawal)
     * @param int $amount The transaction amount (in cents)
     * @param int $balanceAfter The account balance after this transaction (in cents)
     */
    public function __construct(
        private \DateTimeInterface $date,
        private string $type,
        private int $amount,
        private int $balanceAfter
    ) {}

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getBalanceAfter(): int
    {
        return $this->balanceAfter;
    }

    /**
     * Determine if the transaction is a deposit
     * @return bool
     */
    public function isDeposit(): bool
    {
        return $this->type === self::TYPE_DEPOSIT;
    }

    /**
     * Determine if the transaction is a withdrawal
     * @return bool
     */
    public function isWithdrawal(): bool
    {
        return $this->type === self::TYPE_WITHDRAWAL;
    }
}