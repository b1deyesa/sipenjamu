<?php

namespace App\Http\Controllers\Dashboard\Akreditasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('dashboard.akreditasi.index');
    }
}
