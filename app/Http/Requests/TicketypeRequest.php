<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TicketypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type' => ['required'],
            'price' => ['required'],
            'description' => ['nullable'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
     
        throw new HttpResponseException(
            response()->json(
                [
                   'message' => 'Validation error',
                   'status' => false,
                   'data' =>$validator->errors()->all()
                ]
            )
        );
    }
}
