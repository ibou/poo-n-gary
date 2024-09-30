<?php

declare(strict_types=1);

namespace App\DesignPattern;

class ExecutiveSuiteDecorator extends ReservationDecorator
{
  public function calculateCost(): float
  {
    return $this->reservation->calculateCost() * 0.9;
  }

}