<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:4|max:255',
            'content' => 'required|min:10',
        ];

    }

    public function messages(){

        return[
            'title.required'=>'Il campo titolo e obbligatorio',
            'title.min'=>'Il campo titolo deve contenere minimo :min caratteri',
            'title.max'=>'Il campo titolo deve contenere minimo :max caratteri',
            'content.required'=>'Il campo contenuto e obbligatorio',
            'content.min'=>'Il campo contenuto deve contenere minimo :min caratteri',
        ];
    }
}
