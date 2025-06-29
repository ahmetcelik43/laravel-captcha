<?php

namespace AhmetCelik43\LaravelCaptcha\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CaptchaCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Session'daki kodu al (aynı attribute ismi ile)
        $sessionCode = session()->pull($attribute);

        if (!$sessionCode || strtolower($sessionCode) !== strtolower($value)) {
            $fail('Güvenlik kodu geçersiz.');
        }
    }
}
