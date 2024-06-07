<?php

namespace Domain\Order\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Translation\PotentiallyTranslatedString;
use Illuminate\Validation\Rules\Password;

class PasswordRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $validator = Validator::make([
            $attribute => $value,
        ], request()->boolean('create_account') ? [
            'required',
            'confirmed',
            Password::default(),
        ] : ['sometimes']);

        if ($validator->failed()) {
            $fail($validator->getMessageBag()->first());
        }
    }
}
