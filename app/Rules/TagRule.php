<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TagRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $array = explode('AND', $value);
        foreach ($array as $arg) {
            if (! is_numeric($arg)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Not all tags given are integers or seperated by AND.';
    }
}
