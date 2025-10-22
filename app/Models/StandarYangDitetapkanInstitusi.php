<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\StandarYangDitetapkanInstitusiUpps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StandarYangDitetapkanInstitusi extends Model
{
    protected $guarded = ['id'];

    public function standarYangDitetapkanInstitusiUpps(): HasMany
    {
        return $this->hasMany(StandarYangDitetapkanInstitusiUpps::class);
    }
}
