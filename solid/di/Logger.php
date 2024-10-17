<?php

declare(strict_types=1);

class Logger
{
  public function __construct(private string $logFile) {}

  public function log($message): void
  {
    $timeStamp = date('Y-m-d H:i:s'); 
    $content = "[$timeStamp]: $message\n"; 
    file_put_contents($this->logFile, $content, FILE_APPEND);
    echo $content;
  }
}
