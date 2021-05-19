<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'category_id' => 'required',
            'is_public' => 'required|boolean',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '内容',
        ];
    }
}
