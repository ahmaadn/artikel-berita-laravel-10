<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view("pages.profile.index", [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with("failed", "Cannot get current user");
        }

        $user = auth()->user();
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('dashboard.profile')->with('success', 'User updated successfully.');
    }
}
