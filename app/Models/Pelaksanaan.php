<?php

namespace App\Models;

use App\Models\PelaksanaanUpps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelaksanaan extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public function pelaksanaanUpps(): HasMany
    {
        return $this->hasMany(PelaksanaanUpps::class);
    }
}