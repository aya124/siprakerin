<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'start_date', 'finish_date','year_id', 'username', 'industry_id', 'teacher_id', 'status_id', 'submit_type', 'student_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

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

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }

    /**
     * Get all of the comments for the Submission
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subdetail()
    {
        return $this->hasMany(SubmissionDetail::class, 'submission_id', 'id');
    }

    public function info()
    {
        return $this->hasMany(SubmissionSuggestion::class, 'submission_id', 'id');
    }
}
