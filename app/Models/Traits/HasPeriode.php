<?php

namespace App\Models\Traits;

use App\Models\Periode;

trait HasPeriode
{
    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}