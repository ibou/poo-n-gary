<?php

declare(strict_types=1);

namespace App\Validation\Validators;

use App\Validation\Rules\ValidationRuleInterface;

class RequiredValidator implements ValidatorInterface
{

    public function validate($value): bool
    {
        return !empty($value);
    }
    public function getMessage(string $name): string
    {
        return $name . ' is a required value';
    }
}