<?php

namespace App\Models;

use App\Models\PeningkatanUpps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peningkatan extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function peningkatanUpps(): HasMany
    {
        return $this->hasMany(PeningkatanUpps::class);
    }
}