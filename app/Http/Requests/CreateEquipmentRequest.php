<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEquipmentRequest extends FormRequest
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
            'purchase_date'=>'required',
            'purchase_from'=>'required',
            'invoice_number'=>'required',
            'user'=>'required',
            'equipment_type'=>'required',
            'manufacture'=>'required',
            'equipment_model'=>'required',
            'serial_number'=>'required',
            'asset_tag'=>'required',
            'case_color'=>'required',
            'operating_system'=>'required',
            'separate_keyboard'=>'required',
            'keyboard_model'=>'required',
            'dongle'=>'required',
            'dongle_asset_tag'=>'required',
            'power_adapter_asset_tag'=>'required',
            'computer_name'=>'required',
            'shipping_case'=>'required'                   
        ];
    }

    public function messages()
    {
        return [ 
            'purchase_date.required'=>'The purchase date field is required.',
            'purchase_from.required'=>'The purchase from field is required.',
            'invoice_number.required'=>'The invoice number field is required.',
            'user.required'=>'The assign to field is required.',
            'equipment_type.required'=>'The type field is required.',
            'manufacture.required'=>'The manufacture field is required.',
            'equipment_model.required'=>'The model field is required.',
            'serial_number.required'=>'The serial number field is required.',
            'asset_tag.required'=>'The asset tag field is required.',
            'case_color.required'=>'The case color field is required.',
            'operating_system.required'=>'The operating system field is required.',
            'separate_keyboard.required'=>'The separate keyboard field is required.',
            'keyboard_model.required'=>'The keyboard model field is required.',
            'dongle.required'=>'The dongle field is required.',
            'dongle_asset_tag.required'=>'The dongle asset tag field is required.',
            'power_adapter_asset_tag.required'=>'The power adapter asset tag field is required.',
            'computer_name.required'=>'The computer name field is required.',
            'shipping_case.required'=>'The shipping case field is required.'
        ];
    }
}
