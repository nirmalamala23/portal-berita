<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();
    
            // Cek nilai kolom type di tabel user
            if (Auth::user()->role_id == 2) {
                return redirect()->intended('/journalist');
            } elseif (Auth::user()->role_id == 1) {
                return redirect()->intended('/admin');
            } else {
                // Jika type tidak 1 atau 2, bisa diarahkan ke halaman default
                return redirect()->intended('/home');
            }
        }
    
        return back()->withErrors('Email atau password salah')->onlyInput('email');
    }
    

    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/berita');
    }

}
