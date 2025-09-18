<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jenjang extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function programStudis(): HasMany
    {
        return $this->hasMany(ProgramStudi::class);
    }
}
