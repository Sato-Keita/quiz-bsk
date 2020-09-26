<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
            'question'=> 'required',
            'category_id' => 'required',
            'selection' => 'required',
            'is_answer' => 'required',
            'answer' => 'required',
            'explain' => 'required',
        ];
    }

    public function messages(){
        return [
            'file.required' => 'SNS画像は必須入力です。',
            'file.image' => '指定されたファイルが画像ではありません。',
            'file.mines' => '指定された拡張子（PNG/JPG/JPEG/GIF）ではありません。',
            'question.required'=> '質問は必須入力です。',
            'category_id.required' => 'カテゴリーは最低1つは選択してください。',
            'selection.required' => '選択肢は最低1つは入力してください。',
            'answer.required' => '答えは必須入力です。',
            'explain.required' => '解説は必須入力です。',
        ];
    }
}
