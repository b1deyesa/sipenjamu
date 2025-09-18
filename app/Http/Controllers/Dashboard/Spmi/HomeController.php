<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Http\Controllers\Controller;
use App\Models\Upps;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Upps $upps)
    {
        $profil_upps = $upps->profilUpps;
        
        return view('dashboard.spmi.home', compact('upps', 'profil_upps'));
    }
}
