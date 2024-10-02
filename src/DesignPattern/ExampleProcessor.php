<?php

declare(strict_types=1);

namespace App\DesignPattern;

use App\Service;

class ExampleProcessor implements Service
{

  public function __construct(private FileWriter $fileWriter) {}

  public function process(array $data): bool
  {
    $result = $this->fileWriter->writeToFile($data);

    if (!$result) {
      throw new \Exception('Error writing to file');
    }

    // Continue processing
    print 'Continue processing...' . PHP_EOL;

    return true;
  }
}
