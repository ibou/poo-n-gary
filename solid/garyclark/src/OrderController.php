<?php

declare(strict_types=1);

namespace Ibou\App;

class OrderController
{
  public function create(Order $order, NotifierInterface $notifier): void
  {
    echo 'Order created '. PHP_EOL; 
    $notifier->send($order);  
  }
}
