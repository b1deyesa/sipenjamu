<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfilUpps extends Model
{
    protected $guarded = ['id'];
    
    public function profil(): BelongsTo
    {
        return $this->belongsTo(Profil::class, 'profil_id');
    }
    
    public function upps(): BelongsTo
    {
        return $this->belongsTo(Upps::class, 'upps_id');
    }
    
    public static function getValue($profil_id, $default = null)
    {
        return static::where('profil_id', $profil_id)->first()->value ?? $default;
    }
}
