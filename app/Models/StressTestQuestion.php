<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StressTestQuestion extends Model
{
    protected $fillable = [
        'stress_test_id',
        'question',
        'order',
    ];

    public function stressTest(): BelongsTo
    {
        return $this->belongsTo(StressTest::class);
    }
}
