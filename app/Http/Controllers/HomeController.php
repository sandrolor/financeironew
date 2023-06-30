<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if (auth()->check()){
            $usuario = auth()->user()->name;
            return view('home', compact('usuario'));
        }else{
            return redirect()->route('login.index');
        }
    }
}
