<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text_user' => ['required','email'],
            'text_password' => ['required', 'min:3', 'max:20']
        ];
    }

    public function messages(){
        return [
            'text_user.required' => 'Field user cannot be empty',
            'text_user.email' => 'Must be a valid e-mail',
            'text_password.required' => 'Field password cannot be empty',
            'text_password.min' => 'password must have at least :min characters',
            'text_password.max' => 'password must have at maximum :max characters'
        ];
    }
}
