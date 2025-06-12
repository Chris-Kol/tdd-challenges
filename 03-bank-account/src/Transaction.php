<?php

declare(strict_types=1);

namespace App;

final class Transaction {
    function __construct(private int $amount, private int $balanceAfter) {}

    public function toString(): string
    {
        return sprintf(
            "%s | %s%d | %d\n",
            date('Y-m-d'),
            $this->amount > 0 ? '+' : '',
            $this->amount,
            $this->balanceAfter
        );
    }
}