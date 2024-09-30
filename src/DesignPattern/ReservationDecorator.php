<?php

declare(strict_types=1);

namespace App\DesignPattern;

abstract class ReservationDecorator implements ReservationInterface
{
  public function __construct(protected ReservationInterface $reservation)
  {
  }
}
