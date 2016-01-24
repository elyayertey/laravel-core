<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MessageRequest extends Request
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
            //
            'subject'=>'required|min:2',
            'email'=>'required|email',
            'content'=>'required',
            'sender_id'=>'required'
        ];
    }

    public function messages(){
        return [
            'subject.required'=>'Please type a subject for your message',
            'email.required'=>'Type your registered email address',
            'content.required'=>'Type a message in the message field'
        ];
    }
}
