<?php

namespace App\Models;

use App\Models\Traits\HasPeriode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MonevRow extends Model
{
    use HasFactory, HasPeriode;

    protected $table = 'monev_rows';

    protected $fillable = [
        'periode_id',
        'monev_table_id',
        'program_studi_id',
        'data'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function table()
    {
        return $this->belongsTo(MonevTable::class, 'monev_table_id');
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }
}