<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'original_name', 'saved_name', 'user_id',
    ];
}
