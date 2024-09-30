<?php

declare(strict_types=1);

namespace App\DesignPattern;


class Song implements Playable
{ 

  public function __construct(private string $name)
  { 
  }

  public function play(): void
  {
    echo "Playing song: {$this->name}\n";
  }
}
