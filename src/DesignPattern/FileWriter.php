<?php

declare(strict_types=1);

namespace App\DesignPattern;

use App\Service;

abstract class FileWriter implements Service
{
  abstract public function writeToFile($data): bool;
}
