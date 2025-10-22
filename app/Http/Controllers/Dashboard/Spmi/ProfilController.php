<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Models\Upps;
use App\Models\Periode;
use App\Models\ProfilUpps;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        $profilUppses = ProfilUpps::where('upps_id', $upps->id)
            ->where('periode_id', $periode->id)
            ->with('profil')
            ->get();

        return view('dashboard.spmi.profil', compact('upps', 'periode', 'profilUppses'));
    }
}