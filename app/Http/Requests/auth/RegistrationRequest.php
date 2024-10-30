<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegistrationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName' => ['required'],
            'lastName' => ['required'],
            'nickName' => ['required'],
            'password' => ['required'],
            'birthday' => ['nullable'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        
        throw new HttpResponseException(
            back()->withErrors($validator->errors()->all())
        );
    }
}
