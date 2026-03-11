<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname'      => 'required|string|max:255',
            'mi'             => 'nullable|string|max:1',
            'lastname'       => 'required|string|max:255',
            'extension_name' => 'nullable|string|max:10',
            'email'          => 'required|email|unique:users',
            'esig'           => 'required|image|mimes:png|max:5120',
            'position'       => 'required|string',
            'division'       => 'required|string',
            'role'           => 'required|in:requestor,signer',
            'password'       => 'required|confirmed|min:8',
        ]);

        $esigPath = $request->file('esig')->store('esigs', 'public');

        $user = User::create([
            'firstname'      => $request->firstname,
            'mi'             => $request->mi,
            'lastname'       => $request->lastname,
            'extension_name' => $request->extension_name,
            'email'          => $request->email,
            'esig'           => $esigPath,
            'position'       => $request->position,
            'division'       => $request->division,
            'role'           => $request->role,
            'password'       => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        // Redirect based on role
        if ($user->role === 'signer') {
            return redirect()->route('dashboard.signer');
        }

        return redirect()->route('dashboard.requestor');
    }
}