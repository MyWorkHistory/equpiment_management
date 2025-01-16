<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingCase extends Model
{
    protected $fillable = [
        'manufacture',
        'model_number',
        'serial_number',
        'asset_tag',
    ];
}
