<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'phone', 'detail', 'username', 'status'
    ];
}
