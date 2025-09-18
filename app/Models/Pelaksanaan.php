<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\PelaksanaanUpps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelaksanaan extends Model
{
    protected $guarded = ['id'];
    
    protected static function booted()
    {
        static::created(function ($pelaksanaan) {
            $uppses = Upps::all();
            foreach ($uppses as $upps) {
                PelaksanaanUpps::create([
                    'pelaksanaan_id' => $pelaksanaan->id,
                    'upps_id' => $upps->id,
                ]);
            }
        });
    }
    
    public function pelaksanaanUpps(): HasMany
    {
        return $this->hasMany(PelaksanaanUpps::class);
    }
}
