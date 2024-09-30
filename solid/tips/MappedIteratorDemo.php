<?php

declare(strict_types=1);

class MappedIteratorDemo implements RecursiveIterator, Countable
{

  public function __construct(private array $items = []) {}

  public function current(): mixed
  {
    return current($this->items);
  }

  public function next(): void
  {
    next($this->items);
  }

  public function key(): mixed
  {
    return key($this->items);
  }

  public function valid(): bool
  {
    return key($this->items) !== null;
  }

  public function rewind(): void
  {
    reset($this->items);
  }

  public function count(): int
  {
    return count($this->items);
  }

  public function hasChildren(): bool
  {
    return is_array($this->current());
  }

  public function getChildren(): ?RecursiveIterator
  {
    return new self($this->items);
  }

}
