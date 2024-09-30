<?php

declare(strict_types=1);

namespace App\DesignPattern;

class Playlist implements Playable
{
  private array $items; 

  public function __construct(private string $name)
  { 
  }

  public function addItem(Playable $item): void
  {
    $this->items[] = $item;
  }

  public function play(): void
  {
    echo "Playing playlist: {$this->name}\n";
    foreach ($this->items as $item) {
      $item->play();
    }
  }
}
