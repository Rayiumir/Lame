<?php

namespace Rayium\Lame\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidMobile implements ValidationRule
{
    public function __construct()
    {
        //
    }
    public function passes($attribute, $value): bool|int
    {
        return preg_match('/^9[0-9]{9}$/', $value);
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^9[0-9]{9}$/', $value)) {
            $fail('شماره '  . $attribute .  'شما 11 رقمی می باشد.' );
        }
    }
}
