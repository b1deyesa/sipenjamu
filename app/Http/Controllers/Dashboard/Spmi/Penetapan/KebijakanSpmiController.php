<?php

namespace App\Http\Controllers\Dashboard\Spmi\Penetapan;

use App\Http\Controllers\Controller;
use App\Models\Upps;
use Illuminate\Http\Request;

class KebijakanSpmiController extends Controller
{
    public function index(Upps $upps)
    {
        return view('dashboard.spmi.penetapan.pengaturan-kebijakan.kebijakan-spmi', compact('upps'));
    }
}