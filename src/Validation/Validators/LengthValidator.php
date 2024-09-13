<?php

declare(strict_types=1);

namespace App\Validation\Validators;

class LengthValidator implements ValidatorInterface
{

    public function __construct(private int $min, private int $max)
    {
    }
    public function validate($value): bool
    {
        return strlen($value) >= $this->min && strlen($value) <= $this->max;
    }

    public function getMessage(string $name): string
    {
        return $name . ' length must be between ' . $this->min . ' and ' . $this->max . ' characters';
    }
}