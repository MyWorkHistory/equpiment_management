<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user',
        'name',
        'phone_number',
        'email'
    ];
}
