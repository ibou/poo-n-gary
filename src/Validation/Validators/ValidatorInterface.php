<?php

namespace App\Validation\Validators;

interface ValidatorInterface
{
    public function validate($value): bool;
    public function getMessage(string $name): string;

}