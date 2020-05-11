<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'picture_url' => 'sometimes|required|file|image|max:2048',
            'dob' => 'required|date',
            'email' => 'required|email|string|max:191',
        ];
    }
}
