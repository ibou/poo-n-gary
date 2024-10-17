<?php

declare(strict_types=1);

namespace App;

interface EmailServiceInterface
{

    public function send(string $to, string $subject, string $body): void;
}