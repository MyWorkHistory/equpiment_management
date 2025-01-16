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
        'shipping_case_number'
    ];
}
