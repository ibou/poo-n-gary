<?php

declare(strict_types=1);

namespace App\Service;

use App\LoggerInterface;

class FileLogger implements LoggerInterface
{
    public function __construct(private string $logFile)
    {
    }

    public function log(string $message): void
    {
        try {
            $message = sprintf('%s: %s', date('Y-m-d H:i:s'), $message);
            file_put_contents($this->logFile, $message.PHP_EOL, FILE_APPEND);
        } catch (\Throwable $e) {

            dump($e->getMessage());
            //throw new \Exception('Error writing log to file');
        }

        foreach ($this->displayLogs() as $log) {
            echo $log.PHP_EOL;
        }

    }

    public function displayLogs(): \Generator
    {
        $content = file($this->logFile, FILE_IGNORE_NEW_LINES);
        foreach ($content as $line) {
            yield $line;
        }
    }
}