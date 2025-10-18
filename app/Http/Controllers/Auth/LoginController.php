<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == true) {
                return redirect('admin/dashboard');
            } else {
                return redirect('dashboard');
            }
        }
        return view('pages.auth.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         if(Auth::user()->is_admin == true) {
    //             return redirect()->intended('admin/dashboard');
    //         } else {
    //             return redirect()->intended('dashboard');
    //         }
    //     }
    //     return back()->withErrors([
    //         'email' => 'Email tidak terdaftar atau kata sandi salah.',
    //     ])->withInput();
    // }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Cek apakah user adalah admin
            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin/dashboard');
            }

            // Jika bukan admin
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial tidak cocok.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
