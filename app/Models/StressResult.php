<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StressResult extends Model
{
    protected $fillable = [
        'stress_test_id',
        'user_id',
        'score',
        'result',
    ];

    public function stressTest(): BelongsTo
    {
        return $this->belongsTo(StressTest::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(StressResultAnswer::class);
    }
}
