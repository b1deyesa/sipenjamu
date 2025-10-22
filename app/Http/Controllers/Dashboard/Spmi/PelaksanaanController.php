<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Models\Upps;
use App\Models\Periode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PelaksanaanUpps;

class PelaksanaanController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        $pelaksanaanUppses = PelaksanaanUpps::where('upps_id', $upps->id)
            ->where('periode_id', $periode->id)
            ->with('pelaksanaan')
            ->get();

        return view('dashboard.spmi.pelaksanaan', compact('upps', 'periode', 'pelaksanaanUppses'));
    }
}
