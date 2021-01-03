<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionDetail extends Model
{
    protected $fillable = [
       'name', 'upload_type', 'full_path','submission_id'
    ];
}
