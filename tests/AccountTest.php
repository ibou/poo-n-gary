<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use TypeError;

class AccountTest extends TestCase
{

  public function testAccountBalanceIsCorrect(): void
  {
    $account = new \App\Account();
    $account->setAccountNumber(123);
    $account->setBalance(100);

    $this->assertSame(123, $account->getAccountNumber());
    $this->assertSame(100, $account->getBalance());
  }

  //assert exeption error
  public function testWrongTypeThrowsAnError(): void
  {
    $account = new \App\Account();


    $this->expectException(TypeError::class);
    $this->expectExceptionMessage('must be of type int|float');

    $account->setBalance("2.9");
  }
}
