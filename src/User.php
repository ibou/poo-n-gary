<?php

declare(strict_types=1);

namespace App;

use ReturnTypeWillChange;

readonly class User implements \ArrayAccess
{
    public function __construct(
        private readonly string $name,
        private string $email,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    #[ReturnTypeWillChange] public function offsetExists($offset): bool
    {
        return isset($this->$offset);
    }

    #[ReturnTypeWillChange] public function offsetGet($offset): mixed
    {
        return $this->$offset;
    }

    #[ReturnTypeWillChange] public function offsetSet($offset, $value): void
    {
        $this->$offset = $value;
    }

    #[ReturnTypeWillChange] public function offsetUnset($offset): void
    {
        unset($this->$offset);
    }
}