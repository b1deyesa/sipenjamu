<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PelaksanaanUpps extends Model
{
    protected $guarded = ['id'];
    
    public function pelaksanaan(): BelongsTo
    {
        return $this->belongsTo(Pelaksanaan::class, 'pelaksanaan_id');
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
