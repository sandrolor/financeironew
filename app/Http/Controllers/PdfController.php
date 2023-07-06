<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $findMovimento = Movimento::all();
            $findMovimento = $findMovimento->sortBy(['data_mov', 'categoria', 'descricao']);
            $pdf = PDF::loadView('mypdf', compact('findMovimento'));
            return $pdf->setPaper('a4','landscape')->stream('mypdf.pdf');
        } else {
            return redirect()->route('login.index');
        }
    }
}
