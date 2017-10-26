<?php

namespace App\Http\Requests\Product;

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
            'txtTitle'           => 'required|unique:product,title',
            'txtSerial'          => 'unique:product,serial',
            'chkCategory'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtTitle.required'           => 'Please Enter Product Name',
            'txtTitle.unique'             => 'Name Is Exist.Please Enter Name Another',
            'txtSerial.unique'            => 'Serial Is Exist.Please Enter Serial Another',
            'chkCategory.required'        => 'Please Select At Least One Category'
        ];
    }
}
