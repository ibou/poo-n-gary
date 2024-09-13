<?php

declare(strict_types=1);

namespace App;

readonly class Admin extends User
{
    public function __construct(
        private readonly string $name,
        private string $email,
        private string $role,
    ) {
        parent::__construct($name, $email);
    }

    public function getRole(): string
    {
        return $this->role;
    }

}