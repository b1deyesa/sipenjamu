<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpmiController extends Controller
{
    public function standarYangDitetapakanInstitusi()
    {
        return view('dashboard.admin.spmi.standar-yang-ditetapkan-institusi');
    }
    
    public function standarLain()
    {
        return view('dashboard.admin.spmi.standar-lain');
    }
    
    public function pelaksanaan()
    {
        return view('dashboard.admin.spmi.pelaksanaan');
    }
    
    public function evaluasi()
    {
        return view('dashboard.admin.spmi.evaluasi');
    }
    
    public function peningkatan()
    {
        return view('dashboard.admin.spmi.peningkatan');
    }
    
    public function pengendalian()
    {
        return view('dashboard.admin.spmi.pengendalian');
    }
}