<?php

declare(strict_types=1);

namespace App\Service;

use App\LoggerInterface;

class DatabaseLogger implements LoggerInterface
{

    public function __construct(private \PDO $connection)
    {
    }

    public function init(): void
    {
        $this->connection->exec('CREATE TABLE IF NOT EXISTS log (id INTEGER PRIMARY KEY, message TEXT NOT NULL)');
    }

    public function log(string $message): void
    {
        $this->init();
        try {
            $this->connection->beginTransaction();
            $this->insertLog($message);
            $this->connection->commit();
        } catch (\PDOException $e) {
            $this->connection->rollBack();
            //throw $e;
            dump($e->getMessage());
        }

        $this->displayLogs();

    }

    private function insertLog(string $message): void
    {
        $message = sprintf('%s: %s', "database:", $message);
        $stmt = $this->connection->prepare('INSERT INTO log (message) VALUES (:message)');
        $stmt->execute(['message' => $message]);
    }

    public function getLogs(): array
    {
        $this->init();
        $stmt = $this->connection->query('SELECT * FROM log');
        return $stmt->fetchAll();
    }

    public function displayLogs(): void
    {
        $logs = $this->getLogs();
        foreach ($logs as $log) {
            dump($log['message']);
        }
    }
}