<?php

declare(strict_types=1);

namespace App\DesignPattern;

class CsvFileWriter extends FileWriter
{
  public function writeToFile($data): bool
  {
    print PHP_EOL . 'Writing to CSV file...' . PHP_EOL;

    sleep(2);

    return true;
  }
}
