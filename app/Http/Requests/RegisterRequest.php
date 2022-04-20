<?php

namespace App\Http\Requests;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rut' => 'required',
            'name' => 'required',
            "last_name" => 'required',
            'email' => 'required|unique:clients,email',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required|min:10',
            'password_confirmation' => 'required|same:password',
        ];
    }
}
