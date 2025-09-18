<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\StandarYangDitetapkanInstitusi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StandarYangDitetapkanInstitusiUpps extends Model
{
    protected $guarded = ['id'];
    
    public function standarYangDitetapkanInstitusi(): BelongsTo
    {
        return $this->belongsTo(StandarYangDitetapkanInstitusi::class, 'standar_yang_ditetapkan_institusi_id');
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
