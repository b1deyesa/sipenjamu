<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonevRow extends Model
{
    protected $fillable = ['monev_table_id', 'upps_id', 'data'];

    protected $casts = [
        'data' => 'array',
    ];

    public function table()
    {
        return $this->belongsTo(MonevTable::class, 'monev_table_id');
    }
}
