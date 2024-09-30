<?php

declare(strict_types=1);

class IterableDemoClass implements Iterator
{
   
    private $index = 0;
    public function __construct(private array $sizes = [])
    {
    }
  
    public function current(): mixed
    {
        echo __FUNCTION__ . PHP_EOL;

        return $this->sizes[$this->index];
    }

    public function key(): mixed
    {
        echo __FUNCTION__ . PHP_EOL;

        return $this->index;
    }

    public function next(): void
    {
        echo __FUNCTION__ . PHP_EOL;

        $this->index++;
    }

    public function rewind(): void
    {
        echo __FUNCTION__ . PHP_EOL;

        $this->index = 0;
    }

    public function valid(): bool
    {
        echo __FUNCTION__ . PHP_EOL;

        return isset($this->sizes[$this->index]);
    }

  
}