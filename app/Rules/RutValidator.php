<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RutValidator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        return ($this->valida_rut($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El RUT no es valido.';
    }

    public function valida_rut($rut)
    {
        //Rut::parse($rut)->validate();
    }
}
