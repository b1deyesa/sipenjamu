<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\Peningkatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeningkatanUpps extends Model
{
    protected $guarded = ['id'];
    
    public function peningkatan(): BelongsTo
    {
        return $this->belongsTo(Peningkatan::class, 'peningkatan_id');
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