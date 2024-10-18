<?php

declare(strict_types=1);

namespace App\Validation\Rules;

use App\Validation\Validators\EmailValidator;
use App\Validation\Validators\ValidatorInterface;
use Attribute;

#[Attribute] 
class Email implements ValidationRuleInterface
{

    public function getValidator(): ValidatorInterface
    {
        return new EmailValidator();
    }
}