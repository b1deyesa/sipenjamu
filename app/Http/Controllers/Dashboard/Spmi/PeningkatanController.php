<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Http\Controllers\Controller;
use App\Models\PeningkatanUpps;
use App\Models\Upps;
use Illuminate\Http\Request;

class PeningkatanController extends Controller
{
    public function index(Upps $upps)
    {
        $peningkatanUppses = PeningkatanUpps::where('upps_id', $upps->id)->get();
        
        return view('dashboard.spmi.peningkatan', compact('upps', 'peningkatanUppses'));
    }
}
