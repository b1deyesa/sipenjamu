<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo};
use App\Models\{Upps, Pengendalian, Periode};
use App\Models\Traits\HasPeriode;

class PengendalianUpps extends Model
{
    use HasFactory, HasPeriode;

    protected $fillable = [
        'periode_id',
        'pengendalian_id',
        'upps_id',
        'link_rtm',
        'link_rtm_testimony',
        'link_rtl',
        'link_rtl_testimony',
        'verification_status',
        'document_status',
    ];

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
        return $this->document_status ? 'Dokumen Ada' : 'Dokumen Ditolak';
    }
}
