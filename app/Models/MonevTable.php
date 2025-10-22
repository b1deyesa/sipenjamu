<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MonevTable extends Model
{
    use HasFactory;

    protected $table = 'monev_tables';

    protected $fillable = [
        'name',
        'category',
        'slug',
    ];

    public function rows()
    {
        return $this->hasMany(MonevRow::class, 'monev_table_id');
    }
    
    public function fields()
    {
        return $this->hasMany(MonevField::class, 'monev_table_id');
    }
}