<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Http\Controllers\Controller;
use App\Models\PelaksanaanUpps;
use App\Models\Upps;
use Illuminate\Http\Request;

class PelaksanaanController extends Controller
{
    public function index(Upps $upps)
    {
        $pelaksanaanUppses = PelaksanaanUpps::where('upps_id', $upps->id)->get();
        
        return view('dashboard.spmi.pelaksanaan', compact('upps', 'pelaksanaanUppses'));
    }
}
