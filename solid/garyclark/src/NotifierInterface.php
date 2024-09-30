<?php

declare(strict_types=1);

namespace Ibou\App;

interface NotifierInterface
{
  public function send(Order $order): void;
}
