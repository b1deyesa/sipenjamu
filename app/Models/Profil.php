<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\Periode;
use App\Models\ProfilUpps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profil extends Model
{
    protected $guarded = ['id'];
    
    public function profilUpps(): HasMany
    {
        return $this->hasMany(ProfilUpps::class);
    }
}
