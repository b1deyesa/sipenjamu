<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\{
    Upps,
    ProgramStudi,
    Pengendalian,
    MonevTable,
    MonevRow
};

class Periode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected static function booted()
    {
        static::created(function ($periode) {
            $uppsList = Upps::all();
            $programStudis = ProgramStudi::all();

            $monevTables = MonevTable::all();
            foreach ($monevTables as $table) {
                foreach ($programStudis as $prodi) {
                    MonevRow::firstOrCreate([
                        'periode_id' => $periode->id,
                        'monev_table_id' => $table->id,
                        'program_studi_id' => $prodi->id,
                    ], [
                        'data' => json_encode([]),
                    ]);
                }
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}