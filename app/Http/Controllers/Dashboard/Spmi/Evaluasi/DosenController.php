<?php

namespace App\Http\Controllers\Dashboard\Spmi\Evaluasi;

use App\Http\Controllers\Controller;
use App\Models\Upps;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Upps $upps)
    {
        return view('dashboard.spmi.evaluasi.dosen', compact('upps'));
    }
}
