<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => "string|max:191|required|unique:mails,title",
//            'content' => "required",
         //   'type_id' => "required",
            'newsletter_id' => "required|exists:newsletters,id"
        ];
    }
}
