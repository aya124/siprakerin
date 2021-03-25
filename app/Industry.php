<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'phone', 'detail', 'username', 'status', 'check',
    ];

    /**
     * Get all of the suggestion for the Industry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suggestion()
    {
        return $this->hasMany(Suggestion::class, 'industry_id', 'id');
    }

    public function submission()
    {
        return $this->hasMany(Submission::class, 'industry_id', 'id');
    }
}
