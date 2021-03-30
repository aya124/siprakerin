<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Certificate extends Model
{
    protected $fillable = [
        'original_name', 'saved_name', 'user_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    /**
    * Get the user associated with the Certificate
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function submission()
    {
        return $this->hasOne(Submission::class, 'certif_id', 'id');
    }
}
