<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'purchase_date',
        'purchase_from',
        'invoice_number',
        'user',
        'equipment_type',
        'manufacture',
        'equipment_model',
        'serial_number',
        'asset_tag',
        'case_color',
        'operating_system',
        'separate_keyboard',
        'keyboard_model',
        'dongle',
        'dongle_asset_tag',
        'power_adapter_asset_tag',
        'computer_name',
        'shipping_case'
    ];

    protected $appends = [
        'client_name',
        'equipment_type_name',
        'shipping_case_number'
    ];

    public function client(){
        return $this->hasOne(User::class,'id','user');
    }

    public function getClientNameAttribute(){
        return $this->client ? $this->client->name : null;
    }

    public function equipmenttype(){
        return $this->hasOne(EquipmentType::class,'id','equipment_type');
    }

    public function getEquipmentTypeNameAttribute(){
        return $this->equipmenttype ? $this->equipmenttype->type_name : null;
    }

    public function shippingcase(){
        return $this->hasOne(ShippingCase::class,'id','shipping_case');
    }
 
    public function getShippingCaseNumberAttribute(){
        return $this->shippingcase ? $this->shippingcase->model_number : null;         
    }
}
