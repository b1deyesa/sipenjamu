<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index');
    } 
    
    public function role()
    {
        return view('dashboard.admin.register.role');
    }
    
    public function upps()
    {
        return view('dashboard.admin.register.upps');
    }
    
    public function jenjang()
    {
        return view('dashboard.admin.register.jenjang');
    }
    
    public function programStudi()
    {
        return view('dashboard.admin.register.program-studi');
    }
    
    public function user()
    {
        return view('dashboard.admin.register.user');
    }
    
    public function periode()
    {
        return view('dashboard.admin.register.periode');
    }
}
