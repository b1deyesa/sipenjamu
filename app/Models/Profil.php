<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profil extends Model
{
    protected $guarded = ['id'];
    
    protected static function booted()
    {
        static::created(function ($profil) {
            $uppses = Upps::all();
            foreach ($uppses as $upps) {
                ProfilUpps::create([
                    'profil_id' => $profil->id,
                    'upps_id' => $upps->id,
                ]);
            }
        });
    }
    
    public function profilUpps(): HasMany
    {
        return $this->hasMany(ProfilUpps::class);
    }
}
