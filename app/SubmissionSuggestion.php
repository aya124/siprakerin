<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionSuggestion extends Model
{
    protected $fillable = [
        'student_id', 'submission_id', 'suggestion', 'status',
    ];

        /**
         * Get the user that owns the Suggestion
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function student()
        {
            return $this->belongsTo(Student::class, 'student_id', 'id');
        }

        public function submission()
        {
            return $this->belongsTo(Submission::class,'submission_id','id');
        }
}
