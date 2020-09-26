<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SnsRequest extends FormRequest
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
            'sns_name' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function messages(){
        return [
            'sns_name.required' => 'SNS名は必須入力です。',

            'file.required' => 'SNS画像は必須入力です。',
            'file.image' => '指定されたファイルが画像ではありません。',
            'file.mines' => '指定された拡張子（PNG/JPG/JPEG/GIF）ではありません。',
        ];
    }
}
