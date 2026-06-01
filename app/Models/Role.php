<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    protected $fillable = ['name'];

    public function users(): BelongsTo
    {
        return $this->hasMany(User::class);
    }
}
