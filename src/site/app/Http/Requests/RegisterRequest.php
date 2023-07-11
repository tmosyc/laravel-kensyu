<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'register_name'=>'required',
            'register_email'=>'required',
            'register_password'=>'required|min:8'
        ];
    }
    public function attributes()
    {
        return [
            'register_name'=>'name',
            'register_email'=>'email',
            'register_password'=>'password'
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'register_name.required' => ':attributeを入力してください。',
            'register_email.required' => ':attributeを入力してください。',
            'register_password.required' => ':attributeを入力してください。',
            'register_password.min' => ':attributeは8文字以上で入力してください。',
        ];
    }
}
