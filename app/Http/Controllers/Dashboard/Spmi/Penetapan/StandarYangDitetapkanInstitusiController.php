<?php

namespace App\Http\Controllers\Dashboard\Spmi\Penetapan;

use App\Models\Upps;
use App\Models\Periode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StandarYangDitetapkanInstitusiUpps;

class StandarYangDitetapkanInstitusiController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        $standarYangDitetapkanInstitusiUppses = StandarYangDitetapkanInstitusiUpps::where('upps_id', $upps->id)->where('periode_id', $periode->id)->with('standarYangDitetapkanInstitusi')->get();

        return view('dashboard.spmi.penetapan.standar-yang-ditetapkan-institusi', compact('upps', 'periode', 'standarYangDitetapkanInstitusiUppses'));
    }
}
