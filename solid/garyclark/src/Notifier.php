<?php

declare(strict_types=1);

namespace Ibou\App;

abstract class Notifier
{
  abstract public function send($to): void;
}