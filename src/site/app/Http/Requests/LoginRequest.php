<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'login_email'=>'required',
            'login_password'=>'required|min:8'
        ];
    }
    public function attributes()
    {
        return [
            'login_email'=>'email',
            'login_password'=>'password'
        ];
    }

    public function messages()
    {
        return [
            'register_email.required' => ':attributeを入力してください。',
            'register_password.required' => ':attributeを入力してください。',
            'register_password.min' => ':attributeは8文字以上で入力してください。',
        ];
    }
}
