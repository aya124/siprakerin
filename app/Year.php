<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'year',
    ];

    /**
     * Get all of the submission for the Year
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submission()
    {
        return $this->hasMany(Submission::class, 'year_id', 'id');
    }
}
