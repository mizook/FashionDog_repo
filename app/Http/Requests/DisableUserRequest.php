<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisableUserRequest extends FormRequest
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
            'userRut' => ['required', 'cl_rut'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El RUT es obligatorio.',
            'cl_rut' => 'RUT inválido.',
        ];
    }
}
