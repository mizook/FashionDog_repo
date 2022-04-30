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
            'rut' => ['required','exists:clients,rut','min:9'],
            'password' =>['required', 'min:10', 'max:15','current_password']
        ];
    }

    public function getCredentials()
    {
        $rut = $this->get('rut');

        return $this->only('rut', 'password');
    }
}
