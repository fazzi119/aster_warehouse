<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->roles()->count() == 0) { // Check if the authenticated user has a role
                Auth::logout();
                return redirect('/')->with('error', 'Hubungi Admin untuk dapatkan akses'); // Redirect to login page with a warning
            }
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('success', 'Anda berhasil login');
        } else {
            return redirect('/')->with('error', 'Email or password is incorrect');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/')->with('success', 'Anda berhasil logout');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:25',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'agree' => 'required',
        ]);

        $user = new User();
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        if ($user->id == 1) {
            $user->assignRole('superadmin');
            return redirect('/')->with('success', 'Registration successful! Please login to continue.');
        } else {
            // $user->assignRole('user');
            return redirect('/')->with('success', 'Registration successful! Please login to continue.');
        }
    }
}
