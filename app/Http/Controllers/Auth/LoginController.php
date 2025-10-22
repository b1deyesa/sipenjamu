<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $userRoles = Auth::user()->roles()->pluck('name');

            if ($userRoles->intersect(['enumerator'])->isNotEmpty()) {
                return redirect()->route('dashboard.spmi.home', [
                    'upps' => Auth::user()->uppses->first()->id,
                    'periode' => Periode::orderBy('id', 'desc')->first()
                ]);
            } elseif ($userRoles->intersect(['admin'])->isNotEmpty()) {
                return redirect()->route('dashboard.admin.register.upps');
            } else {
                return redirect()->route('dashboard.monev.index');
            }
        }

        return redirect()->route('auth.login.index')->with('error', 'Email or Password Wrong!');
    }
}
