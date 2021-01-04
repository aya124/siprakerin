<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'score_1', 'score_2', 'score_3', 'score_4', 'score_5', 'score_6',
    ];
}
