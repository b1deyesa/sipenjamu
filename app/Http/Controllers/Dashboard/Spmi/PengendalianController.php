<?php

namespace App\Http\Controllers\Dashboard\Spmi;

use App\Models\Upps;
use App\Models\Periode;
use App\Models\PengendalianUpps;
use App\Http\Controllers\Controller;

class PengendalianController extends Controller
{
    public function index(Upps $upps, Periode $periode)
    {
        $pengendalianUppses = PengendalianUpps::where('upps_id', $upps->id)
            ->where('periode_id', $periode->id)
            ->where(function ($query) {
                $query->whereNotNull('link_rtm')
                      ->orWhereNotNull('link_rtl')
                      ->orWhereNotNull('link_rtm_testimony')
                      ->orWhereNotNull('link_rtl_testimony');
            })
            ->with('pengendalian')
            ->get();

        return view('dashboard.spmi.pengendalian', compact('upps', 'periode', 'pengendalianUppses'));
    }
}