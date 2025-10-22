<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Http\Request;

class SpmiController extends Controller
{
    public function profil(Periode $periode)
    {
        return view('dashboard.admin.spmi.profil', compact('periode'));
    }
    
    public function standarYangDitetapakanInstitusi(Periode $periode)
    {
        return view('dashboard.admin.spmi.standar-yang-ditetapkan-institusi', compact('periode'));
    }
    
    public function standarLain(Periode $periode)
    {
        return view('dashboard.admin.spmi.standar-lain', compact('periode'));
    }
    
    public function pelaksanaan(Periode $periode)
    {
        return view('dashboard.admin.spmi.pelaksanaan', compact('periode'));
    }
    
    public function evaluasiLain(Periode $periode)
    {
        return view('dashboard.admin.spmi.evaluasi-lain', compact('periode'));
    }
    
    public function peningkatan(Periode $periode)
    {
        return view('dashboard.admin.spmi.peningkatan', compact('periode'));
    }
    
    public function pengendalian(Periode $periode)
    {
        return view('dashboard.admin.spmi.pengendalian', compact('periode'));
    }
}