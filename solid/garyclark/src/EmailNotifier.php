<?php

declare(strict_types=1);

namespace Ibou\App;

class EmailNotifier implements NotifierInterface
{
  public function send(Order $to): void
  { 
    printf('Sending email to : %s with email %s ' . \PHP_EOL, $to->getOrderer(), $to->getEmail());
  }
}
