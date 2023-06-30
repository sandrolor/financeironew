<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovimentosController extends Controller
{
    public function index(){
        if (auth()->check()){
            $usuario = auth()->user()->name;
            return view('movimentos.index', compact('usuario'));
        }else{
            return redirect()->route('login.index');
        }
    }
}
