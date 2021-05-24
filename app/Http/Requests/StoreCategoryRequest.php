<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'description' => ['sometimes', 'nullable', 'min:4' , 'max:800' , 'string'],
        ];
    }

    public function attributes()
    {
        return [
          'name' => 'Name',
          'description' => 'Description',
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
        ];
    }
}
