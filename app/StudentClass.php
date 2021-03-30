<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $fillable = [
        'name', 'accro',
    ];

    /**
     * Get all of the student for the StudentClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }
}
