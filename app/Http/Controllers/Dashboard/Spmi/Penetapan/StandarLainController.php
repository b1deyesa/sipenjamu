<?php

namespace App\Http\Controllers\Dashboard\Spmi\Penetapan;

use App\Models\Upps;
use Illuminate\Http\Request;
use App\Models\StandarLainUpps;
use App\Http\Controllers\Controller;
use App\Models\StandarLain;

class StandarLainController extends Controller
{
    public function index(Upps $upps)
    {
        $standarLains = StandarLain::where('upps_id', $upps->id)->get();
        
        return view('dashboard.spmi.penetapan.standar-lain', compact('upps', 'standarLains'));
    }
}
