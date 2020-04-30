<?php

namespace App\Http\Requests\Component;

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
            'content' => "required|unique:components,content,".$this->component->id.',id',
            'type_id' => "required|exists:types,id"

        ];
    }
}
