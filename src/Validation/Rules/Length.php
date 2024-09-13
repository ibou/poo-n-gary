<?php

declare(strict_types=1);

namespace App\Validation\Rules;

use App\Validation\Validators\LengthValidator;
use App\Validation\Validators\ValidatorInterface;

#[\Attribute]
readonly class Length implements ValidationRuleInterface
{

    public function __construct(private int $min, private int $max)
    {
    }

    public function getValidator(): ValidatorInterface
    {
        return new LengthValidator($this->min, $this->max);
    }
}