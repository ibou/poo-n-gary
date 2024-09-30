<?php

declare(strict_types=1);

namespace App\DesignPattern;


class Video implements Playable
{ 

  public function __construct(private string $name)
  { 
  }

  public function play(): void
  {
    echo "Playing video: {$this->name}\n";
  }
}
