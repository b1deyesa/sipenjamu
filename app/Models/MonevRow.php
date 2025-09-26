<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MonevRow extends Model
{
    use HasFactory;

    protected $table = 'monev_rows';

    protected $fillable = [
        'monev_table_id',
        'upps_id',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function table()
    {
        return $this->belongsTo(MonevTable::class, 'monev_table_id');
    }

    public function upps()
    {
        return $this->belongsTo(Upps::class, 'upps_id');
    }
}