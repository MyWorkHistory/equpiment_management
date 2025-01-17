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
    protected $appends = [
        'client_name', 
    ];

    public function client(){
        return $this->hasOne(User::class,'id','user');
    }

    public function getClientNameAttribute(){
        return $this->client ? $this->client->name : null;
    }
}
