<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
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
            'user'=>'required',
            'name'=>'required',
            'phone_number'=>'required',  
            'email' => [
                'required',
                'email',
                Rule::unique('contacts')->ignore($this->route('id')),
            ],      
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'The client field is required.',
            'name.required' => 'The name field is required.',
            'phone_number.required' => 'The phone number field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email address is already in use.',
            'email.email' => 'The email address must have email style.',
        ];
    }
}
