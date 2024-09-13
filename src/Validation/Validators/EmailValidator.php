<?php

namespace App\Validation\Validators;

use App\Validation\Validators\ValidatorInterface;

class EmailValidator implements ValidatorInterface
{

    public function validate($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
    public function getMessage(string $name): string
    {
        return $name . ' is not a valid email address';
    }

}