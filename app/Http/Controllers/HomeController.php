<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Conta;
use App\Models\Movimento;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $usuario = auth()->user()->name;
            $findConta = Conta::count();
            $findCategoria = Categoria::count();
            $findMovimento = Movimento::count();
            return view('home', compact('findConta', 'findCategoria', 'findMovimento', 'usuario'));
        } else {
            return redirect()->route('login.index');
        }
    }
}
