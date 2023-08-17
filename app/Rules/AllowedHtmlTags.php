<?php

namespace App\Rules;

use Closure;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Contracts\Validation\ValidationRule;

class AllowedHtmlTags implements ValidationRule
{
    private $allowedTags = [];
    public function __construct(array $allowedTags = [])
    {
        $this->allowedTags = $allowedTags;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $purifiedValue = Purifier::clean($value);
        $strippedValue = strip_tags($purifiedValue, '<' . implode('><', $this->allowedTags) . '>');
        if ($strippedValue !== $purifiedValue) {
            $fail("The :attribute contains disallowed HTML tags. Use Only : ( " . implode(' - ', $this->allowedTags)  . ' ).');
        }
    }
}
