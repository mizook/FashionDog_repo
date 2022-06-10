<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeServiceRequest extends FormRequest
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
            'input_date' => ['required'],
            'input_time' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'input_date.required'  => 'Debes escoger una fecha.',
            'input_time.required'  => 'Debes escoger una hora.'
        ];
    }
}
