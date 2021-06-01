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
            'name' => ['required','min:3' , 'max:191' , 'string'],
            'description' => ['sometimes', 'nullable', 'min:5' , 'max:800' , 'string'],
//            'photo' => ['sometimes', 'nullable', 'image' , 'mimes:jpeg,png,jpg,gif,svg' , 'max:2048'],
            'photo' => ['sometimes', 'nullable', 'max:2048'],
            'category_id' => ['sometimes', 'nullable', 'exists:categories,id' ],
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'Name',
            'description' => 'Description',
            'photo' => 'Photo',
            'category_id' => 'Post Category',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'The Name Is required',
            'name.min' => 'The Minimum Length For Name Is 3 Character',
            'name.max' => 'The Maximum Length For Name Is 191 Character',
            'name.string' => 'The Name Must Be String',

            'description.min' => 'The Minimum Length For Description Is 4 Character',
            'description.max' => 'The Maximum Length For Description Is 800 Character',
            'description.string' => 'The Description Must Be String',

            'photo.image' => 'The Photo Must Be Image',
            'photo.mimes' => 'The Photo Must Be end with one of this [jpeg - png - jpg - gif - svg] ',
            'photo.max' => 'The Max Size Allow to Photo is 2048 byte',

            'category_id.exists' => 'Must choose existing Category',
        ];
    }
}
