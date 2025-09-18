<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\StandarYangDitetapkanInstitusiUpps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StandarYangDitetapkanInstitusi extends Model
{
    protected $guarded = ['id'];
    
    protected static function booted()
    {
        static::created(function ($standar_yang_ditetapkan_institusi) {
            $uppses = Upps::all();
            foreach ($uppses as $upps) {
                StandarYangDitetapkanInstitusiUpps::create([
                    'standar_yang_ditetapkan_institusi_id' => $standar_yang_ditetapkan_institusi->id,
                    'upps_id' => $upps->id,
                ]);
            }
        });
    }
    
    public function standarYangDitetapkanInstitusiUpps(): HasMany
    {
        return $this->hasMany(StandarYangDitetapkanInstitusiUpps::class);
    }
}
