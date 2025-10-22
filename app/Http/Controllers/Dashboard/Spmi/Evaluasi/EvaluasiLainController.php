<?php

namespace App\Http\Controllers\Dashboard\Spmi\Evaluasi;

use App\Models\Upps;
use App\Models\Periode;
use App\Models\Evaluasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluasiLainController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        $evaluasis = Evaluasi::where('upps_id', $upps->id)->get();
        
        return view('dashboard.spmi.evaluasi.evaluasi-lain', compact('upps', 'periode', 'evaluasis'));
    }
}
