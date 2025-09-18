<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Models\Upps;
use Illuminate\Http\Request;
use App\Models\PengendalianUpps;
use App\Http\Controllers\Controller;

class PengendalianController extends Controller
{
    public function index(Upps $upps)
    {
        $pengendalianUppses = PengendalianUpps::where('upps_id', $upps->id)->get();
        
        return view('dashboard.spmi.pengendalian', compact('upps', 'pengendalianUppses'));
    }
}
