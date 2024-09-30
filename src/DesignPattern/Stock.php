<?php

declare(strict_types=1);

namespace App\DesignPattern;

use SplObserver;

class Stock implements \SplSubject
{
  private int $price = 0;
  private int $change;
  private \SplObjectStorage $observers;

  public function __construct()
  {
    $this->observers = new \SplObjectStorage();
  }

  public function getLatestPrice(): void
  {
    echo "\nStock: Fetching price update from 3rd party API.\n";

    $newPrice = random_int(0, 15);
    $this->change = $newPrice - $this->price;
    $this->price = $newPrice;
    \dump("Stock: New price is: {$this->price}");

    $this->notify();
  }

  public function attach(SplObserver $observer): void
  {
    $this->observers->attach($observer);
  }

  public function detach(SplObserver $observer): void
  {
    $this->observers->detach($observer);
  }

  public function notify(): void
  {
    foreach ($this->observers as $observer) {
      $observer->update($this);
    }
  }

  public function getPrice(): int
  {
    return $this->price;
  }

  public function getChange(): int
  {
    return $this->change;
  }
}