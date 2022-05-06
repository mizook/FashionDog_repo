<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => ['required', 'min:10', 'max:15'],
            'confirm_password' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'password.required'  => 'La contraseña es obligatoria',
            'password.min'  => 'El largo de la contraseña debe estar entre 10 y 15 carácteres.',
            'password.max'  => 'El largo de la contraseña debe estar entre 10 y 15 carácteres.',
            'confirm_password.required'  => 'La contraseña es obligatoria.',
            'confirm_password.same'  => 'Las contraseñas no coinciden.',
        ];
    }
}
