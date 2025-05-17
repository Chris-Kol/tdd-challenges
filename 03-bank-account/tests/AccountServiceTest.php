<?php

declare(strict_types=1);

namespace Tests;

use AccountServiceInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AccountService
 */
class AccountServiceTest extends TestCase
{
    private AccountServiceInterface $accountService;

    protected function setUp(): void
    {
        // TODO: Initialize your implementation here with a mock date provider
    }

    public function testInitialBalanceIsZero(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testDepositIncreasesBalance(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testMultipleDepositsIncreaseBalance(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testWithdrawDecreasesBalance(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testCannotWithdrawMoreThanBalance(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testCannotDepositNegativeAmount(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testCannotWithdrawNegativeAmount(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testCannotDepositZeroAmount(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testCannotWithdrawZeroAmount(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testPrintEmptyStatement(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testPrintStatementWithTransactions(): void
    {
        $this->markTestIncomplete('Implement this test');
    }

    public function testStatementShowsTransactionsInReverseChronologicalOrder(): void
    {
        $this->markTestIncomplete('Implement this test');
    }
}