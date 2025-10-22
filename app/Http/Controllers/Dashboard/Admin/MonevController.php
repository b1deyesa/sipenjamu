<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonevController extends Controller
{
    public function buku()
    {
        return view('dashboard.admin.monev.buku');
    }
    
    public function tks()
    {
        return view('dashboard.admin.monev.tks');
    }
}