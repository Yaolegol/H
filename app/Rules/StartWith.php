<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StartWith implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($value, $message = null)
    {
        $this->value = $value;
        $this->message = $message ?? 'Значение должно начинаться с ' . $value;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return str_starts_with($value, $this->value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
