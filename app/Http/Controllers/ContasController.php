<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestConta;
use App\Models\Conta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class ContasController extends Controller
{
    public function __construct(Conta $conta)
    {
        $this->conta = $conta;
    }

    public function index(Request $request)
    {
        if (auth()->check()) {
            $usuario = auth()->user()->name;

            $pesquisar = $request->pesquisar;
            $findConta = $this->conta->getContasPesquisaIndex(search: $pesquisar ?? '');

            return view('contas.index', compact('usuario', 'findConta'));
        } else {
            return redirect()->route('login.index');
        }
    }

    public function delete(string $id): RedirectResponse
    {
        Conta::destroy($id);
        return redirect()->route('conta.index');
    }

    public function cadastrarConta(FormRequestConta $request)
    {
        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();

            $findConta = Conta::where('nome', '=', $data['nome'])->first();

            if ($findConta == null){
                Conta::create($data);
            }
            
            return redirect()->route('conta.index');
        }
        $usuario = auth()->user()->name;
        return view('contas.create', compact('usuario'));
    }

    public function atualizarConta(FormRequestConta $request, $id)
    {
        if ($request->method() == "PUT") {
            //atualiza os dados
            $data = $request->all();
            $buscaRegistro = Conta::find($id);
            $buscaRegistro->update($data);
            return redirect()->route('conta.index');
        }
        $findConta = Conta::where('id', '=', $id)->first();
        $usuario = auth()->user()->name;
        return view('contas.atualiza', compact('findConta', 'usuario'));
    }
}
