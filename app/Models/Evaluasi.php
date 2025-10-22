<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\Traits\HasPeriode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluasi extends Model
{
    use HasFactory, HasPeriode;

    protected $fillable = [
        'periode_id',
        'upps_id',
        'name',
        'date',
        'link',
        'verification_status',
        'document_status'
    ];
    
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
