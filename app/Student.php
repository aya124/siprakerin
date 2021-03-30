<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'nis', 'class_id',
    ];

    protected $primaryKey = 'username';

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    /**
     * Get all of the comments for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function industry()
    {
        return $this->hasMany(Industry::class, 'student_id', 'id');
    }

     public function submission()
    {
        return $this->hasMany(Submission::class, 'student_id', 'id');
    }

    public function suggestion()
    {
        return $this->hasMany(Suggestion::class, 'student_id', 'id');
    }

    /**
     * Get the report associated with the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function report()
    {
        return $this->hasOne(Report::class, 'student_id', 'id');
    }

    public function certificate()
    {
        return $this->hasOne(Certificate::class, 'student_id', 'id');
    }

}
