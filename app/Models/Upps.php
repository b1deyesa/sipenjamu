<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pelaksanaan;
use App\Models\Peningkatan;
use App\Models\StandarLain;
use App\Models\ProgramStudi;
use App\Models\PelaksanaanUpps;
use App\Models\PeningkatanUpps;
use App\Models\StandarLainUpps;
use Illuminate\Database\Eloquent\Model;
use App\Models\StandarYangDitetapkanInstitusi;
use App\Models\StandarYangDitetapkanInstitusiUpps;
use App\View\Components\Layout\Penetapan;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Upps extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
    
    protected static function booted()
    {
        static::created(function ($upps) {
            $profils = Profil::all();
            foreach ($profils as $profil) {
                Profil::create([
                    'profil_id' => $profil->id,
                    'upps_id' => $upps->id
                ]);
            }
            
            $pelaksanaans = Pelaksanaan::all();
            foreach ($pelaksanaans as $pelaksanaan) {
                PelaksanaanUpps::create([
                    'pelaksanaan_id' => $pelaksanaan->id,
                    'upps_id' => $upps->id
                ]);
            }
            
            $peningkatans = Peningkatan::all();
            foreach ($peningkatans as $peningkatan) {
                PeningkatanUpps::create([
                    'peningkatan_id' => $peningkatan->id,
                    'upps_id' => $upps->id
                ]);
            }
            
            $standar_yang_ditetapkan_institusis = StandarYangDitetapkanInstitusi::all();
            foreach ($standar_yang_ditetapkan_institusis as $standar_yang_ditetapkan_institusi) {
                StandarYangDitetapkanInstitusiUpps::create([
                    'standar_yang_ditetapkan_institusi_id' => $standar_yang_ditetapkan_institusi->id,
                    'upps_id' => $upps->id
                ]);
            }
        });
    }
    
    public function programStudis(): HasMany
    {
        return $this->hasMany(ProgramStudi::class);
    }
    
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    
    public function profilUpps(): HasMany
    {
        return $this->hasMany(ProfilUpps::class);
    } 
    
    public function standarLains(): HasMany
    {
        return $this->hasMany(StandarLain::class);
    }
    
    public function evaluasis(): HasMany
    {
        return $this->hasMany(Evaluasi::class);
    }
    
    public function monevs(): HasMany
    {
        return $this->hasMany(MonevTable::class);
    }
    
    public function standarYangDitetapkanInstitusiUpps(): HasMany
    {
        return $this->hasMany(StandarYangDitetapkanInstitusiUpps::class);
    }
    
    public function standarLainUpps(): HasMany
    {
        return $this->hasMany(StandarLainUpps::class);
    }
    
    public function pelaksanaanUpps(): HasMany
    {
        return $this->hasMany(PelaksanaanUpps::class);
    }
    
    public function pengendalianUpps(): HasMany
    {
        return $this->hasMany(PengendalianUpps::class);
    }
    
    public function peningkatanUpps(): HasMany
    {
        return $this->hasMany(PeningkatanUpps::class);
    }
}
