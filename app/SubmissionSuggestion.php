<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionSuggestion extends Model
{
    protected $fillable = [
        'user_id', 'submission_id', 'info', 'status',
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

        public function submission()
        {
            return $this->belongsTo(Submission::class,'submission_id','id');
        }
}
