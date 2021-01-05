<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'original_name', 'saved_name', 'user_id',
    ];
}
