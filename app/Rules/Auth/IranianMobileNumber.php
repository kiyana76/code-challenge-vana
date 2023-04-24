<?php

namespace App\Rules\Auth;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IranianMobileNumber implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match("/^09([0-9][0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/", $value)) {
            $fail(trans('validation.attributes.wrong_mobile_format'));
        }
    }
}
