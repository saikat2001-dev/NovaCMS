<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailUnique implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $isEmailTaken = User::isEmailTaken($value);

        if ($isEmailTaken) {
            $fail('The :attribute has already been taken.');
        }
    }
}
