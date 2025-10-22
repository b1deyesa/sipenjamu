<?php

namespace App\Http\Controllers\Dashboard\Spmi\Penetapan;

use App\Models\Upps;
use App\Models\Periode;
use App\Models\StandarLain;
use App\Models\StandarLainUpps;
use App\Http\Controllers\Controller;

class StandarLainController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        $standarLains = StandarLain::join('standar_lain_upps', 'standar_lains.id', '=', 'standar_lain_upps.standar_lain_id')
            ->where('standar_lains.upps_id', $upps->id)
            ->where('standar_lain_upps.periode_id', $periode->id)
            ->select('standar_lains.*', 'standar_lain_upps.description', 'standar_lain_upps.link', 'standar_lain_upps.verification_status', 'standar_lain_upps.document_status')
            ->get();

        return view('dashboard.spmi.penetapan.standar-lain', compact('upps', 'periode', 'standarLains'));
    }
}