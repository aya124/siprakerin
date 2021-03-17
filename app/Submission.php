<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'start_date', 'finish_date', 'username', 'industry_id', 'teacher_id', 'status_id', 'submit_type'
    ];

}
