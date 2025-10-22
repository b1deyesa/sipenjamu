<?php

namespace App\Http\Controllers\Dashboard\Spmi\Evaluasi;

use App\Models\Upps;
use App\Models\Periode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        return view('dashboard.spmi.evaluasi.mahasiswa', compact('upps', 'periode'));
    }
}
