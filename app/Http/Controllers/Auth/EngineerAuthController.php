<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Engineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class EngineerAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('engineer.register');
    }

    public function showLoginForm()
    {
        return view('engineer.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:engineers'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'specialization' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'qualifications' => ['nullable', 'string'],
        ]);

        $engineer = Engineer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'specialization' => $request->specialization,
            'phone' => $request->phone,
            'address' => $request->address,
            'bio' => $request->bio,
            'qualifications' => $request->qualifications,
        ]);

        Auth::guard('engineer')->login($engineer);

        return redirect()->route('engineer.home');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('engineer')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('engineer.home');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('engineer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
