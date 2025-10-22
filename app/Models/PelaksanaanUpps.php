<?php

namespace App\Models;

use App\Models\Upps;
use App\Models\Pelaksanaan;
use App\Models\Traits\HasPeriode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PelaksanaanUpps extends Model
{
    use HasFactory, HasPeriode;

    protected $fillable = [
        'periode_id',
        'pelaksanaan_id',
        'upps_id',
        'setting_status',
        'link',
        'verification_status',
        'document_status'
    ];
    
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
            ? 'Sudah Upload Dokumen'
            : 'Belum Upload Dokumen';
    }
}