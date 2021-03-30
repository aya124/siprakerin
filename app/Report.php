<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'original_name', 'saved_name', 'user_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    
    /**
    * Get the user associated with the Report
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function submission()
    {
        return $this->hasOne(Submission::class, 'report_id', 'id');
    }

}
