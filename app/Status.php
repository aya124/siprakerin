<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the comments for the Status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submission()
    {
        return $this->hasMany(Submission::class, 'status_id', 'id');
    }
}
