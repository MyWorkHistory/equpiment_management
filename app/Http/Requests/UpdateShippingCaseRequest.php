<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShippingCaseRequest extends FormRequest
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
            'manufacture'=>'required',
            'model_number'=>'required',
            'serial_number'=>'required',  
            'asset_tag'=>'required',            
        ];
    }

    public function messages()
    {
        return [
            'manufacture.required' => 'The manufacture field is required.',
            'model_number.required' => 'The model number field is required.',
            'serial_number.required' => 'The serial number field is required.',
            'asset_tag.required' => 'The asset tag field is required.',
        ];
    }
}
