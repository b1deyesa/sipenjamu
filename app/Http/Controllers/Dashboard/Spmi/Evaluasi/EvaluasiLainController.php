<?php

namespace App\Http\Controllers\Dashboard\Spmi\Evaluasi;

use App\Http\Controllers\Controller;
use App\Models\Evaluasi;
use App\Models\Upps;
use Illuminate\Http\Request;

class EvaluasiLainController extends Controller
{
    public function index(Upps $upps)
    {
        $evaluasis = Evaluasi::where('upps_id', $upps->id)->get();
        
        return view('dashboard.spmi.evaluasi.evaluasi-lain', compact('upps', 'evaluasis'));
    }
}
