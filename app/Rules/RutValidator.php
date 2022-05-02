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
    public function __construct($rut)
    {
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut))
            return false;
        if (str_contains($rut, '.') || str_contains($rut, '-'))
            return false;

        $rut = preg_replace('/[\.\-]/i', '', $rut);
        $dv = substr($rut, -1);
        //dd($dv);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);

        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            return false;
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
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut))
            return false;


        $rut = preg_replace('/[\.\-]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);

        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }
}
