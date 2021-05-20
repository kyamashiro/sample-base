<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleSearchRequest extends FormRequest
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
            'title' => 'max:255',
            'body' => 'max:255',
            'created_at_from' => ['nullable', 'date'],
            'created_at_to' => ['nullable', 'date'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '内容',
            'created_at_from' => '作成日開始',
            'created_at_to' => '作成日終了',
        ];
    }
}
