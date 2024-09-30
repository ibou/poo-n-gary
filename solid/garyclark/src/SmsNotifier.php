<?php

declare(strict_types=1);

namespace Ibou\App;

class SmsNotifier implements NotifierInterface
{
  public function send(Order $to): void
  {
    printf('Sending SMS to : %s with email %s ' . \PHP_EOL, $to->getOrderer(), $to->getEmail()); 
  }
}
