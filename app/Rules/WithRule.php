<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WithRule implements Rule
{
    protected $allowed;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($allowed)
    {
        $this->allowed = $allowed;
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
        $valid = true;
        $array = explode(',', $value);

        foreach($array as $arg) {
            $valid = in_array($arg, $this->allowed);
        }

        return $valid;
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
