<?php

declare(strict_types=1);

namespace Tests;

use App\AccountService;
use App\AccountServiceInterface;
use App\Exception\InsufficientFundsException;
use App\Exception\InvalidAmountException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AccountService
 */
class AccountServiceTest extends TestCase
{
    private AccountServiceInterface $accountService;

    protected function setUp(): void
    {
        $this->accountService = new AccountService();
    }

    public function testInitialBalanceIsZero(): void
    {
        $this->assertSame(0, $this->accountService->getBalance());
    }

    public function testDepositIncreasesBalance(): void
    {
        $this->accountService->deposit(3);

        self::assertSame(3, $this->accountService->getBalance());
    }

    public function testMultipleDepositsIncreaseBalance(): void
    {
        $this->accountService->deposit(3);
        $this->accountService->deposit(5);
        $this->accountService->deposit(5);
        $this->accountService->deposit(5);
        $this->accountService->deposit(5);

        self::assertSame(23, $this->accountService->getBalance());
    }

    public function testWithdrawDecreasesBalance(): void
    {
        $this->accountService->deposit(10);
        $this->accountService->withdraw(3);

        self::assertSame(7, $this->accountService->getBalance());
    }

    public function testCannotWithdrawMoreThanBalance(): void
    {
        $this->expectException(InsufficientFundsException::class);
        $this->accountService->deposit(10);
        $this->accountService->withdraw(15);
    }

    public function testCannotDepositNegativeAmount(): void
    {
        $this->expectException(InvalidAmountException::class);
        $this->accountService->deposit(-1);
    }

    public function testCannotWithdrawNegativeAmount(): void
    {
        $this->expectException(InvalidAmountException::class);
        $this->accountService->withdraw(-1);
    }

    public function testCannotDepositZeroAmount(): void
    {
        $this->expectException(InvalidAmountException::class);
        $this->accountService->deposit(0);
    }

    public function testCannotWithdrawZeroAmount(): void
    {
        $this->expectException(InvalidAmountException::class);
        $this->accountService->withdraw(-0);
    }

    public function testPrintEmptyStatement(): void
    {
        self::assertSame('', $this->accountService->printStatement());
    }

    public function testPrintStatementWithTransactions(): void
    {
        $this->accountService->deposit(15);

        $currentTime = date('Y-m-d');

        $result = $this->accountService->printStatement();

        $expected = sprintf("DATE | AMOUNT | BALANCE\n%s | +15 | 15\n", $currentTime);

        self::assertSame($expected, $result);
    }

    public function testStatementShowsTransactionsInReverseChronologicalOrder(): void
    {
        $this->accountService->deposit(15);
        $this->accountService->withdraw(5);

        $currentTime = date('Y-m-d');

        $result = $this->accountService->printStatement();

        $expected = sprintf("DATE | AMOUNT | BALANCE\n%s | -5 | 10\n%s | +15 | 15\n", $currentTime, $currentTime);

        self::assertSame($expected, $result);
    }
}