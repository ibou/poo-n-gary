<?php

declare(strict_types=1);

namespace App\Service;

use App\EmailServiceInterface;
use App\LoggerInterface;

class EmailService implements EmailServiceInterface
{

    public function __construct(private LoggerInterface $logger)
    {
    }
    public function send(string $to, string $subject, string $body): void
    {
        //mail(to: $email, subject: 'Log message', message: $body);
        $message = sprintf('to : %s, content : %s', $to, $body);
        $this->logger->log($message);
    }
}