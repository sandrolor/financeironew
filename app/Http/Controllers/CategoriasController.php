<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCategoria;
use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function index(Request $request)
    {
        if (auth()->check()) {
            $usuario = auth()->user()->name;
            $pesquisar = $request->pesquisar;
            $findCategoria = $this->categoria->getCategoriasPesquisaIndex(search: $pesquisar ?? '');
            return view('categorias.index', compact('findCategoria', 'usuario'));
        } else {
            return redirect()->route('login.index');
        }
    }

    public function delete(string $id): RedirectResponse
    {
        Categoria::destroy($id);
        return redirect()->route('categoria.index');
    }

    public function cadastrarCategoria(FormRequestCategoria $request)
    {
        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();
            Categoria::create($data);
            return redirect()->route('categoria.index');
        }
        $usuario = auth()->user()->name;
        return view('categorias.create', compact('usuario'));
    }

    public function atualizarCategoria(FormRequestCategoria $request, $id)
    {
        if ($request->method() == "PUT") {
            //atualiza os dados
            $data = $request->all();
            $buscaRegistro = Categoria::find($id);
            $buscaRegistro->update($data);
            return redirect()->route('categoria.index');
        }
        $findCategoria = Categoria::where('id', '=', $id)->first();
        $usuario = auth()->user()->name;
        return view('categorias.atualiza', compact('findCategoria', 'usuario'));
    }
}
