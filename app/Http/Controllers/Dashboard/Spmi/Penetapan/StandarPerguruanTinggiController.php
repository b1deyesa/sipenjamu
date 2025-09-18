<?php

namespace App\Http\Controllers\Dashboard\Spmi\Penetapan;

use App\Http\Controllers\Controller;
use App\Models\Upps;
use Illuminate\Http\Request;

class StandarPerguruanTinggiController extends Controller
{
    public function index(Upps $upps)
    {
        return view('dashboard.spmi.penetapan.pengaturan-kebijakan.standar-perguruan-tinggi', compact('upps'));
    }
}
