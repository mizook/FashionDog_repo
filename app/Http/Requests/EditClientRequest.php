<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditClientRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:26'],
            'last_name' => ['required', 'min:2', 'max:26'],
            'email' => ['required', 'max:320', 'email'],
            'address' => ['required', 'max:30'],
            'phone' => ['required', 'min:9', 'max:15'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'El nombre es obligatorio.',
            'name.min'  => 'El nombre debe tener más de 2 carácteres.',
            'name.max'  => 'El nombre debe tener máximo 26 letras.',
            'last_name.required'  => 'El apellido es obligatorio.',
            'last_name.min'  => 'El apellido debe tener más de 2 carácteres.',
            'last_name.max'  => 'El apellido debe tener máximo 26 letras.',
            'email.required'  => 'El correo electrónico es obligatorio.',
            'email.max'  => 'El correo electrónico debe tener máximo 320 carácteres.',
            'email.unique'  => 'El correo electrónico ya existe en el sistema.',
            'email.email'  => 'Su correo electrónico no es válido. Asegúrate de escribir un correo electrónico válido (ejemplo@ejemplo.com).',
            'address.required'  => 'La dirección es obligatoria.',
            'address.max'  => 'La dirección debe tener máximo 30 carácteres.',
            'phone.required'  => 'El teléfono es obligatorio.',
            'phone.min'  => 'El teléfono debe tener mínimo 9 números. El teléfono móvil ingresado no es válido.',
            'phone.max'  => 'El teléfono debe tener máximo 15 números. El teléfono móvil ingresado no es válido.',
        ];
    }
}
