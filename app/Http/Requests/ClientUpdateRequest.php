<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->route('id')),
            ],
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone_number' => 'required',
            'account_password' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.unique' => 'The email address is already in use.',
            'email.email' => 'The email address must have email style.',
            'city.required' => 'The city field is required.',
            'state.required' => 'The state field is required.',
            'zip.required' => 'The zip field is required.',
            'phone_number.required' => 'The phone number field is required.',
            'account_password.required' => 'The password field is required.',
            'address.required' => 'The address field is required.',
        ];
    }
}
