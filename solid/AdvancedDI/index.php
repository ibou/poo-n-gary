<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Service\DatabaseLogger;
use App\Service\EmailService;
use App\Service\FileLogger;
use App\Service\LoggerInterface;
use App\Service\UserService;

try {
    $container = new App\Container\Container();

    $container->set(id: 'pdo', callable: new PDO('sqlite::memory:'));

    $container->set(
        id: 'loggerDB',
        callable: new DatabaseLogger(
            connection: $container->get(id: 'pdo')
        )
    );

    $container->set(id: 'loggerFile', callable: new FileLogger( logFile: __DIR__ . '/app.log' ));

    $emailService = new EmailService(
        logger: $container->get(id: 'loggerFile')
    );

    $container->set(id: 'emailService', callable: $emailService);


    $container->set(id: 'userService',
        callable: new UserService(
            emailService: $container->get(id: 'emailService'),
            logger: $container->get(id: 'loggerFile')
        )
    );
    $userService = $container->get(id: 'userService');
    $userService->register(email: 'silabeth@gamail.com');

} catch (Exception $e) {
    dump($e->getMessage());
}



