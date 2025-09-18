<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramStudi extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function upps(): BelongsTo
    {
        return $this->belongsTo(Upps::class, 'upps_id');
    }
    
    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(Jenjang::class, 'jenjang_id');
    }
}
