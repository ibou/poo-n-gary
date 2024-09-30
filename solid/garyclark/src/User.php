<?php

//declare(strict_types=1);

namespace Ibou\App;

class User
{
  public function __construct(
    public string $name,
    public readonly string $email
  ) {}

  public string $fullName {
      get {
          return $this->name.' '.$this->email;
      }
      set(string $name) => $this->name = \ucfirst($name);
  }

  public string $emailString {
      get => $this->email;
  } 

  public function getName(): string
  {
    return $this->name;
  }

  public function getEmail(): string
  {
    return $this->email;
  }
}