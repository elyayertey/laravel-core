<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SettingsRequest extends Request
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
            'name'=>'required|min:3',
            'firstname'=>'required|min:3',
            'lastname'=>'required|min:3',
            'email'=>'required|email',
            'gender'=>'required',
            'phone'=>'required',
            'country'=>'required',
            'state'=>'required',
            'street'=>'required',
            'city'=>'required',
            'zip'=>'required|min:4'

            //
        ];
    }
}
