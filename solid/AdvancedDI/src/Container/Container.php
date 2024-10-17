<?php

namespace App\Container;

class Container
{

    private array $services = [];

    public function set(string $id, mixed $callable): void
    {
        $this->services[$id] = $callable;
    }

    public function get(string $id): mixed
    {
        if (!isset($this->services[$id])) {
            throw new \Exception("Service container '$id' not found");
        }
        return $this->services[$id];
    }
}