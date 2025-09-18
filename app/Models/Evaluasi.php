<?php

namespace App\Models;

use App\Models\Upps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluasi extends Model
{
    protected $guarded = ['id'];
    
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
