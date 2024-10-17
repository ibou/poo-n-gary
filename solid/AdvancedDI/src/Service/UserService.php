<?php

declare(strict_types=1);

namespace App\Service;

use App\EmailServiceInterface;
use App\LoggerInterface;

class UserService
{

    public function __construct(
        private EmailServiceInterface $emailService,
        private LoggerInterface $logger
    )
    {
    }

    public function register(string $email): void
    {
        $message = sprintf('%s: %s', "New user registered.", $email);
        $this->emailService->send($email, 'Welcome', 'Thank you for registering');
        dump("dump console : ".$message);
    }
}