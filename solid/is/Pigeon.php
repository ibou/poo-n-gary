<?php

class Pigeon implements BirdInterface
{
  public function eat()
  {
    var_dump('Eating');
  }

  public function fly()
  {
    var_dump('Pigeon Flying ');
  }
}