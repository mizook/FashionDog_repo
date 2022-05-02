<?php

namespace App\Http\Requests;

use App\Rules\RutValidator;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    //new RutValidator

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rut' => ['required', 'unique:clients,rut', 'cl_rut'],
            'name' => ['required', 'min:2', 'max:26'],
            'last_name' => ['required', 'min:2', 'max:26'],
            'email' => ['required', 'max:320', 'unique:clients,email', 'email'],
            'address' => ['required', 'max:30'],
            'phone' => ['required', 'min:9', 'max:15'],
            'password' => ['required', 'min:10', 'max:15', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'rut.cl_rut' => 'RUT inválido.',
            'rut.string' => 'RUT inválido.',
            'rut.required' => 'El RUT es obligatorio.',
            'rut.unique' => 'El RUT ya existe en el sistema.',
            'name.required'  => 'El nombre es obligatorio.',
            'name.min'  => 'El campo nombre deben tener más de 2 caracteres.',
            'name.max'  => 'El nombre debe tener máximo 26 letras.',
            'last_name.required'  => 'El apellido es obligatorio.',
            'last_name.min'  => 'El campo apellido debe tener más de 2 caracteres.',
            'last_name.max'  => 'El apellido debe tener máximo 26 letras.',
            'email.required'  => 'El correo electrónico es obligatorio.',
            'email.max'  => 'El correo electrónico debe tener máximo 320 carácteres.',
            'email.unique'  => 'El correo electrónico ya existe en el sistema.',
            'email.email'  => 'Su correo electrónico no es válido. Asegúrate de escribir un correo electrónico válido (ejemplo@ejemplo.com).',
            'address.required'  => 'El domicilio es obligatorio.',
            'address.max'  => 'El domicilio debe tener máximo 30 carácteres.',
            'phone.required'  => 'El teléfono es obligatorio.',
            'phone.min'  => 'El teléfono debe tener mínimo 9 números. El teléfono móvil ingresado no es válido.',
            'phone.max'  => 'El teléfono debe tener máximo 15 números. El teléfono móvil ingresado no es válido',
            'password.required'  => 'La contraseña es obligatoria',
            'password.min'  => 'La contraseña debe tener mínimo 10 carácteres.',
            'password.max'  => 'La contraseña debe tener máximo 15 carácteres.',
            'password.same'  => 'Las contraseñas no coinciden.',
            'password_confirmation.required'  => 'La contraseña es obligatoria.',
            'password_confirmation.same'  => 'Las contraseñas no coinciden.',
        ];
    }
}
