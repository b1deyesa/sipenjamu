<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\Upps;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        $profil_upps = $upps->profilUpps()
            ->where('periode_id', $periode->id)
            ->with('profil')
            ->get();
            
        return view('dashboard.spmi.home', [
            'upps' => $upps,
            'periode' => $periode,
            'profil_upps' => $profil_upps,
            'penetapan' => $upps->standarYangDitetapkanInstitusiUpps()->where('periode_id', $periode->id)->get(),
            'pelaksanaan' => $upps->pelaksanaanUpps()->where('periode_id', $periode->id)->get(),
            'evaluasis' => $upps->evaluasis()->where('periode_id', $periode->id)->get(),
            'pengendalian' => $upps->pengendalianUpps()->where('periode_id', $periode->id)->get(),
            'peningkatan' => $upps->peningkatanUpps()->where('periode_id', $periode->id)->get(),
        ]);
    }
}
