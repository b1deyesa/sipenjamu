<?php

namespace App\Http\Controllers\Dashboard\Spmi\Penetapan;

use App\Http\Controllers\Controller;
use App\Models\StandarYangDitetapkanInstitusiUpps;
use App\Models\Upps;
use Illuminate\Http\Request;

class StandarYangDitetapkanInstitusiController extends Controller
{
    public function index(Upps $upps)
    {
        $standarYangDitetapkanInstitusiUppses = StandarYangDitetapkanInstitusiUpps::where('upps_id', $upps->id)->get();
        
        return view('dashboard.spmi.penetapan.standar-yang-ditetapkan-institusi', compact('upps', 'standarYangDitetapkanInstitusiUppses'));
    }
}
