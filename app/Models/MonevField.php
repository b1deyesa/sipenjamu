<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonevField extends Model
{
    protected $fillable = ['monev_table_id', 'name', 'type'];

    public function table()
    {
        return $this->belongsTo(MonevTable::class, 'monev_table_id');
    }
}
