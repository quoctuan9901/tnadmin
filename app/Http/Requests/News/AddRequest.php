<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'txtTitle'           => 'required|unique:news,title',
            'chkCategory'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtTitle.required'           => 'Please Enter News Title',
            'txtTitle.unique'             => 'Title Is Exist.Please Enter Title Another',
            'chkCategory.required'        => 'Please Select At Least One Category'
        ];
    }
}
