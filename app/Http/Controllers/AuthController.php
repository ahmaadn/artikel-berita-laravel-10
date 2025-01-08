<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view("pages.auth.login");
    }

    public function login_proses(Request $request): RedirectResponse
    {
        $this->validate($request, [
            "email" => "required",
            "password" => "required",
        ]);

        $data = $request->only("email", "password");

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('auth.login')->with('failed', 'Email atau password salah');
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function register(): View
    {
        return view("pages.auth.register");
    }

    public function register_proses(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('home')->with('success', 'Akun berhasil dibuat');
    }
}
