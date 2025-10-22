<?php

namespace App\Http\Controllers\Dashboard\Spmi\Penetapan;

use App\Models\Upps;
use App\Models\Periode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KebijakanSpmiController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        return view('dashboard.spmi.penetapan.pengaturan-kebijakan.kebijakan-spmi', compact('upps', 'periode'));
    }
}