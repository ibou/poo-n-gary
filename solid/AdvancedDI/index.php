<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

try {

    $configuration = new App\Configuration(
        loggerType: 'file',
        logFilePath: __DIR__ . '/app.log',
    );

    $configuration = new App\Configuration(
        loggerType: 'db',
        dbDsn: 'sqlite::memory:',
    );
    $application = new App\Application($configuration);
    $userService = $application->getUserService();
    $userService->register(email: 'daranto@daranto.ue');

} catch (\Exception $e) {
    dump($e->getMessage());
}







