<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {

        if (auth()->check()) {
            $usuario = auth()->user()->name;
        } else {
            $usuario = null;
        }
        return view('login', compact('usuario'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'Obrigatório email válido',
            'password.required' => 'O campo password é obrigatório',
        ]);

        $credentials = $request->only('email', 'password');
        $autenticated = Auth::attempt($credentials);

        if (!$autenticated) {
            return redirect()->route('login.index')->withErrors(['error' => 'email or password invalid']);
        }

        return redirect()->route('home');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
