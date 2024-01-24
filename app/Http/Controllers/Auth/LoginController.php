<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard-staff')->with('success', 'Login berhasil');
        } else {
            return back()->with('error', 'Login gagal, Pastikan username dan password benar');
        }
    }
}
