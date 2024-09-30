<?php

declare(strict_types=1);

namespace App\DesignPattern;

interface ReservationInterface
{
  public function calculateCost(): float;
}
