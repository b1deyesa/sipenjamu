<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StandarLain extends Model
{
    protected $guarded = ['id'];

    public function upps(): BelongsTo
    {
        return $this->belongsTo(Upps::class, 'upps_id');
    }

    public function standarLainUpps(): HasMany
    {
        return $this->hasMany(StandarLainUpps::class, 'standar_lain_id');
    }
}