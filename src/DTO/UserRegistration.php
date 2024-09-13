<?php

declare(strict_types=1);

namespace App\DTO;

use App\Validation\Rules\Length;
use App\Validation\Rules\Required;
use App\Validation\Rules\Email;

readonly class UserRegistration
{

    public function __construct(
        #[Required, Length(min: 3, max: 50)]
        public string $name,
        #[Required, Email]
        private string $email,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}
