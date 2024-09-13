<?php

declare(strict_types=1);

namespace App\Validation\Rules;

use App\Validation\Validators\RequiredValidator;
use App\Validation\Validators\ValidatorInterface;

#[\Attribute]
class Required implements ValidationRuleInterface
{

    public function getValidator(): ValidatorInterface
    {
        return new RequiredValidator();
    }
}