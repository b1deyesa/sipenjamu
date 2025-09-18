<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Http\Controllers\Controller;
use App\Models\Upps;
use Illuminate\Http\Request;

class ProfilUppsController extends Controller
{
    public function index(Upps $upps)
    {
        return view('dashboard.spmi.profil-upps', compact('upps'));
    }
}
