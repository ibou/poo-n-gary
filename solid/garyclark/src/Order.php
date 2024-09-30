<?php

declare(strict_types=1);

namespace Ibou\App;

class Order
{

  public function __construct(
    private readonly string $orderer,
    private readonly string $email
  ) {}

 
  public function getOrderer(): string
  {
    return $this->orderer;
  }

  public function getEmail(): string
  {
    return $this->email;
  }
}
