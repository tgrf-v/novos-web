<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StressResultAnswer extends Model
{
    protected $fillable = [
        'stress_result_id',
        'question_id',
        'answer',
    ];

    public function stressResult(): BelongsTo
    {
        return $this->belongsTo(StressResult::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(StressTestQuestion::class, 'question_id');
    }
}
