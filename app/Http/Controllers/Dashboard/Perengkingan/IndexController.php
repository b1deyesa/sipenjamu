<?php

namespace App\Http\Controllers\Dashboard\Perengkingan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('dashboard.perengkingan.index');
    }
}
