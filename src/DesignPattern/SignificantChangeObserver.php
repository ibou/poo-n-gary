<?php

declare(strict_types=1);

namespace App\DesignPattern;

use SplSubject;

class SignificantChangeObserver implements \SplObserver
{
  public function update(SplSubject $stock): void
  {
    if ($stock->getPrice() < 3) {
      echo "Buying 200 more at {$stock->getPrice()} .\n";
      return;
    }

    if ($stock->getPrice() < 7) {
      echo "Buying 100 more at {$stock->getPrice()} .\n";
    }
  }
}