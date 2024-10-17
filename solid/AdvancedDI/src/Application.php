<?php

declare(strict_types=1);

namespace App;


use App\Container\Container;
use App\Service\DatabaseLogger;
use App\Service\EmailService;
use App\Service\FileLogger;
use App\Service\UserService;
use PDO;

class Application
{
    private Container $container;
    private Configuration $config;

    public function __construct(Configuration $config)
    {
        $this->config = $config;
        $this->container = new Container();
        $this->registerServices();
    }

    private function registerServices(): void
    {
        // Register PDO with configuration
        $this->container->set(
            id: 'pdo',
            callable: new PDO(
                $this->config->getDbDsn(),
                $this->config->getDbUsername(),
                $this->config->getDbPassword()
            )
        );

        // Register loggers with configuration
        $this->container->set(
            id: 'loggerDB',
            callable: new DatabaseLogger(
                connection: $this->container->get(id: 'pdo')
            )
        );

        $this->container->set(
            id: 'loggerFile',
            callable: new FileLogger(
                logFile: $this->config->getLogFilePath()
            )
        );

        // Set active logger based on configuration
        $this->container->set(
            id: 'logger',
            callable: $this->container->get(
                id: $this->config->getLoggerType() === 'file' ? 'loggerFile' : 'loggerDB'
            )
        );

        // Rest of the services...
        $this->container->set(
            id: 'emailService',
            callable: new EmailService(
                logger: $this->container->get(id: 'logger')
            )
        );

        $this->container->set(
            id: 'userService',
            callable: new UserService(
                emailService: $this->container->get(id: 'emailService'),
                logger: $this->container->get(id: 'logger')
            )
        );
    }

    public function getUserService(): UserService
    {
        return $this->container->get(id: 'userService');
    }

    public function getContainer(): Container
    {
        return $this->container;
    }
}