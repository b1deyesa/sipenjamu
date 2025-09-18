<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\Pengendalian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengendalianUpps extends Model
{
    protected $guarded = ['id'];
    
    public function pengendalian(): BelongsTo
    {
        return $this->belongsTo(Pengendalian::class, 'pengendalian_id');
    }

    public function upps(): BelongsTo
    {
        return $this->belongsTo(Upps::class, 'upps_id');
    }
    
    public function getDocumentStatusLabelAttribute(): string
    {
        return $this->document_status
            ? 'Dokumen Ada'
            : 'Dokumen Ditolak';
    }
}
