<?php

namespace App\Http\Requests\Newsletter;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>"required|unique:newsletters,name,{$this->newsletter->id},id",
            'description'=>'required',
            'active'=>'required|numeric||min:0|max:1'
        ];
    }
}
