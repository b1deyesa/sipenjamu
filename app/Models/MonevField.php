<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MonevField extends Model
{
    use HasFactory;

    protected $table = 'monev_fields';

    protected $fillable = [
        'monev_table_id',
        'name',
        'type',
    ];

    public function table()
    {
        return $this->belongsTo(MonevTable::class, 'monev_table_id');
    }
}