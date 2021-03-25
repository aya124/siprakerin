<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Builder\Stub;

class Submission extends Model
{
    protected $fillable = [
        'start_date', 'finish_date', 'username', 'industry_id', 'teacher_id', 'status_id', 'submit_type'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'id');
    }

    public function score()
    {
        return $this->belongsTo(Score::class, 'score_id', 'id');
    }

    public function certificate()
    {
        return $this->belongsTo(Certificate::class, 'certif_id', 'id');
    }
}
