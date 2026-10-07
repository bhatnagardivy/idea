<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function storeUser(Request $req)
    {
        $req->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        Auth::login($user);

        $req->session()->regenerate();

        return redirect('/')->with('success', 'Registration Complete!');
    }

    public function getUser(Request $req)
    {
        $attributes = $req->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        if (!Auth::attempt($attributes)) {
            return back()->withErrors(['password' => 'We are unable to authenticate using the provided credentials.'])->withInput();
        }

        $req->session()->regenerate();

        return redirect()->intended('/')->with('success', 'You are now logged in.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
