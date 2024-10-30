<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
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
            'event_id' => ['required|exists:events,id'],
            'tickets' => ['required|array'],
            'tickets.*.type_id' => ['required|exists:ticket_types,id'],
            'tickets.*.quantity' => ['required|integer|min:1'],
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
