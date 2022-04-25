<?php

namespace App\Http\Requests;

use App\Rules\RutValidator;
use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
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
            'rut' => ['required', 'unique:clients,rut', new RutValidator],
            'password' => ['required', 'min:10', 'max:15'],
        ];
    }

    public function messages()
    {
        return [
            'rut.string' => 'El rut es obligatorio.',
            'rut.required' => 'El rut es obligatorio.',
            'rut.unique' => 'El rut ya existe en el sistema.',
            'password.required'  => 'La contraseña es obligatoria',
            'password.min'  => 'La contraseña debe tener mínimo 10 carácteres.',
            'password.max'  => 'La contraseña debe tener máximo 15 carácteres.',
        ];
    }
}
