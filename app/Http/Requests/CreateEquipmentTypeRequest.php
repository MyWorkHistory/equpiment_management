<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEquipmentTypeRequest extends FormRequest
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
            'type_name'=>'required|unique:equipment_types',            
        ];
    }

    public function messages()
    {
        return [
            'type_name.required' => 'The type of equipment field is required.',
            'type_name.unique' => 'The type of equipment must be unique.',            
        ];
    }
}
