<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidUsername implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^([a-zA-Z]{3,13})(_[a-zA-Z0-9]{1,2})?(\.[a-zA-Z0-9])?$/', $value)) {
            $fail("The $attribute must have at least 3 letters, a maximum of 13 characters, at most 2 underscores, and at most 1 dot.");
        }
    }
}
