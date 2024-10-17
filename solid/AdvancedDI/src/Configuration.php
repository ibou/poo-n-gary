<?php

declare(strict_types=1);

namespace App;


readonly class Configuration
{
    public function __construct(
        private string $loggerType = 'file',
        private string $logFilePath = __DIR__ . '/app.log',
        private string $dbDsn = 'sqlite::memory:',
        private ?string $dbUsername = null,
        private ?string $dbPassword = null
    ) {}

    public function getLoggerType(): string
    {
        return $this->loggerType;
    }

    public function getLogFilePath(): string
    {
        return $this->logFilePath;
    }

    public function getDbDsn(): string
    {
        return $this->dbDsn;
    }

    public function getDbUsername(): ?string
    {
        return $this->dbUsername;
    }

    public function getDbPassword(): ?string
    {
        return $this->dbPassword;
    }
}