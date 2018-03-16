<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WithRule implements Rule
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
        $array = explode(',', $value);
        if (in_array('tags', $array) || in_array('category', $array) || in_array('ingredients', $array)) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid parameters in with, must be category,tags and/or ingredients!';
    }
}
