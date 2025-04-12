<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login',[
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => "required|email",
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('loginError','login Failed!');
    }
    public function register(){
        return view('auth.register',[
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    public function store(Request $request){
        // Validasi Input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:4|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|in:admin,petugas,dokter,kasir',
            'password' => 'required|min:5|',
        ]);

        // Simpan User ke Database
        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
