<?php

declare(strict_types=1);

namespace App;
 
class ServiceLocator
{
  private  array $services = [];
  private array $instantiated = [];

  public function addInstance(string $class, Service $service): void
  {
    $this->instantiated[$class] = $service;
  }

  //addclass
  public function addClass(string $class, array $constructorParams): void
  {
    $this->services[$class] = $constructorParams;
  }

  //has
  public function has(string $interface): bool
  {
    return isset($this->instantiated[$interface]) || isset($this->services[$interface]);
  }

  public function get(string $class): Service
  {
    if (isset($this->instantiated[$class])) {

      return $this->instantiated[$class];
    }

    $object = new $class(...$this->services[$class]);

    $this->instantiated[$class] = $object;

    return $object;
  }
}
