<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DesignRequest extends Model
{
    protected $fillable = [
        'order_id',
        'team_name',
        'no_punggung',
        'detail_sponsor',
        'jenis_potongan',
        'lengan_jahitan',
        'logo',
        'primary_color',
        'secondary_color',
        'motif',
        'material',
        'collar_style',
        'priority',
        'additional_notes',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
