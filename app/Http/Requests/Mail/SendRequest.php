<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
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
            'txtTo'       => 'required',
            'txtFullname' => 'required',
            'txtSubject'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtTo.required'       => 'Please Enter Email To',
            'txtFullname.required' => 'Please Enter Fullname',
            'txtSubject.required'  => 'Please Enter Subject',
        ];
    }
}
