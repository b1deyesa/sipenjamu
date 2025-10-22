<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Models\Upps;
use App\Models\Periode;
use App\Models\PeningkatanUpps;
use App\Http\Controllers\Controller;

class PeningkatanController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        $peningkatanUppses = PeningkatanUpps::where('upps_id', $upps->id)
            ->where('periode_id', $periode->id)
            ->with('peningkatan')
            ->get();

        return view('dashboard.spmi.peningkatan', compact('upps', 'periode', 'peningkatanUppses'));
    }
}