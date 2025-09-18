<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\PengendalianUpps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengendalian extends Model
{
    protected $guarded = ['id'];
       
    public function pengendalianUpps(): HasMany
    {
        return $this->hasMany(PengendalianUpps::class);
    }
}
