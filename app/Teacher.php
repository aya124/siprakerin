<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id', 'name', 'nip',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the comments for the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function industry()
    {
        return $this->hasMany(Industry::class, 'teacher_id', 'id');
    }

    public function submission()
    {
        return $this->hasMany(submission::class, 'teacher_id', 'id');
    }

    public function suggestion()
    {
        return $this->hasMany(Suggestion::class, 'teacher_id', 'id');
    }
}
