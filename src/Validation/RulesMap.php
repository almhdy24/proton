<?php

namespace Proton\Validation;

use Proton\Validation\Rules\RequierdRule;
use Proton\Validation\Rules\AlphaNumeircalRule;
use Proton\Validation\Rules\MaxRule;
use Proton\Validation\Rules\BetweenRule;
use Proton\Validation\Rules\EmailRule;
use Proton\Validation\Rules\ConfirmRule;

class RulesMap 
{
    protected static array $map = [
       'requierd' => RequierdRule::class, 
       'alnum' => AlphaNumeircalRule::class,
       'max' => MaxRule::class, 
       'between' => BetweenRule::class, 
       'email' => EmailRule::class, 
       'confirmed' => ConfirmRule::class, 
    ];
     
    public static function resolve(string $rule, $options)
    {
        return new static::$map[$rule] (...$options);
    }
}