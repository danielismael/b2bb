<?php

namespace App\Http\Requests\UserDealer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class NewUserDealerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_dealer' => ['required', 'int'],
            'type' => ['required', 'int'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:user_dealer'],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }


    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new httpResponseException(response()->json(
            $validator->errors()
        )->setStatusCode(422));
    }
}
