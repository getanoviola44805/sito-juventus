<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function mostraRegistrazione()
    {
        return view('auth.registrazione');
    }

    public function registra(Request $request)
    {
        $dati = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'regex:/[0-9]/', 'confirmed'],
        ], [
            'name.required' => 'Il nome è obbligatorio.',
            'name.min' => 'Il nome deve avere almeno 3 caratteri.',
            'name.max' => 'Il nome può avere al massimo 50 caratteri.',
            'email.required' => "L'email è obbligatoria.",
            'email.email' => "L'email non è valida.",
            'email.unique' => 'Questa email è già registrata.',
            'password.required' => 'La password è obbligatoria.',
            'password.min' => 'La password deve avere almeno 8 caratteri.',
            'password.regex' => 'La password deve contenere almeno un numero.',
            'password.confirmed' => 'Le due password non coincidono.',
        ]);

        $utente = User::create([
            'name' => $dati['name'],
            'email' => $dati['email'],
            'password' => Hash::make($dati['password']),
        ]);

        Auth::login($utente);
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function mostraLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenziali = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => "L'email è obbligatoria.",
            'email.email' => "L'email non è valida.",
            'password.required' => 'La password è obbligatoria.',
        ]);

        if (Auth::attempt($credenziali)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()
            ->withErrors(['email' => 'Email o password non corretti.'])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}