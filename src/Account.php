<?php

declare(strict_types=1);

namespace App;

class Account
{
  private int $accountNumber;
  private int|float $balance;

  public function setBalance(int|float $balance): void
  {
    $this->balance = $balance;
  }

  public function getBalance(): int
  {
    return $this->balance;
  }

  public function setAccountNumber(int $accountNumber): void
  {
    $this->accountNumber = $accountNumber;
  }

  public function getAccountNumber(): int|float
  {
    return $this->accountNumber;
  }


}
