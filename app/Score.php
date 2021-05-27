<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'score_1', 'score_2', 'score_3', 'score_4', 'score_5', 'score_6', 'score_7', 'score_8', 'score_9',
    ];

    /**
    * Get the user associated with the Score
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function submission()
    {
        return $this->hasMany(Submission::class, 'score_id', 'id');
    }

}
