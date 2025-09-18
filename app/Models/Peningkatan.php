<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\PeningkatanUpps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peningkatan extends Model
{
    protected $guarded = ['id'];
    
    protected static function booted()
    {
        static::created(function ($peningkatan) {
            $uppses = Upps::all();
            foreach ($uppses as $upps) {
                PeningkatanUpps::create([
                    'peningkatan_id' => $peningkatan->id,
                    'upps_id' => $upps->id,
                ]);
            }
        });
    }
    
    public function peningkatanUpps(): HasMany
    {
        return $this->hasMany(PeningkatanUpps::class);
    }
}
