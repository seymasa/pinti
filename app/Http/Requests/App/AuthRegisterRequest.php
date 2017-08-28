<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
            "firstname" => "required",
            "surname" => "required",
            "email" => "required|unique:users",
            "password" => "required|confirmed|min:6"
        ];
    }
}
