<?php

namespace App\Models;

use App\Models\PengendalianUpps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengendalian extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function pengendalianUpps(): HasMany
    {
        return $this->hasMany(PengendalianUpps::class);
    }
}