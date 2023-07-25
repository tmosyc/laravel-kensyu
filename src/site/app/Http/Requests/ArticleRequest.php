<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required',
            'content'=>'required',
            'images' =>'nullable|array',
            'check' =>'nullable|string',
            'tags'=>'nullable|array'
        ];
    }

    public function attributes()
    {
        return [
            'title'=>'タイトル',
            'content'=>'内容',
            'image'=>'画像',
            'check'=>'サムネイル',
            'tags'=>'タグ'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ':attributeを入力してください。',
            'content.required' => ':attributeを入力してください。',
        ];
    }
}
