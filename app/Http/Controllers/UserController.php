<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view("pages.users.index", ['users' => User::all()]);
    }

    public function edit($id): View
    {
        $user = User::findOrFail($id);
        return view('pages.users.edit', ['user' => $user]);
    }

    public function create(): View
    {
        return view('pages.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:user,admin', // Role harus 'user' atau 'admin'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User added successfully.');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users.index')->with('failed', 'User not found.');
        }

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'role' => 'in:user,admin', // Role harus 'user' atau 'admin'
        ]);

        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->role = $request->role ?? $user->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.users.index')
                ->with('success', 'User is deleted successfully.');
        } else {
            return redirect()->route('admin.users.index')
                ->with('error', 'Cannot Delete user.');
        }

    }
}
