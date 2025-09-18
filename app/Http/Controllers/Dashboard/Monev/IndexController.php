<?php

namespace App\Http\Controllers\Dashboard\Monev;

use App\Models\Upps;
use App\Models\MonevTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Upps $upps)
    {
        $monevs = MonevTable::all();

        return view('dashboard.monev.index', compact('upps', 'monevs'));
    }
    
    public function show(Upps $upps, $slug)
    {
        $monev = MonevTable::where('slug', $slug)->first();
        
        return view('dashboard.monev.show', compact('upps', 'monev'));
    }
}
