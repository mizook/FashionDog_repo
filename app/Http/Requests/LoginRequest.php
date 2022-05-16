<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'rutLogin' => ['required'],
            'passwordLogin' => ['required']
        ];
    }

    public function getCredentials()
    {
        $rut = $this->get('rut');

        return $this->only('rut', 'password');
    }

    public function messages()
    {
        return [
            'rutLogin.required' => 'El RUT es obligatorio.',
            'passwordLogin.required'  => 'La contraseña es obligatoria.',

        ];
    }
}
