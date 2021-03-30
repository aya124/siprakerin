<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = [
        'user_id', 'industry_id', 'suggestion', 'status',
    ];

        /**
         * Get the user that owns the Suggestion
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id', 'id');
        }

        public function industry()
        {
            return $this->belongsTo(Industry::class,'industry_id','id');
        }

}
