<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestMovimento;
use App\Models\Categoria;
use App\Models\Componentes;
use App\Models\Conta;
use App\Models\Movimento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovimentosController extends Controller
{
    public function __construct(Movimento $movimento)
    {
        $this->movimento = $movimento;
    }
    public function index(Request $request){
        if (auth()->check()){
            $usuario = auth()->user()->name;
            $findConta = Conta::all();
            $pesquisar = $request->pesquisar;
            $contaId = $request->conta_id;
            $dataIni = $request->data_ini;
            $dataFim = $request->data_fim;
            $findMovimento = $this->movimento->getMovimentosPesquisaIndex(search: $pesquisar ?? '', idConta: $contaId ?? '', from: $dataIni ?? '', to: $dataFim ?? '');
            $totalMov = Movimento::sum('valor');
            $totalFind = $findMovimento->sum('valor');
            return view('movimentos.index', compact('findMovimento', 'totalMov', 'findConta','usuario','totalFind','pesquisar', 'dataIni','dataFim','contaId'));
        }else{
            return redirect()->route('login.index');
        }
    }

    public function delete(string $id): RedirectResponse
    {
        Movimento::destroy($id);
        return redirect()->route('movimento.index');
    }

    public function cadastrarMovimento(FormRequestMovimento $request)
    {
        $findConta = Conta::all();
        $findCategoria = Categoria::all();

        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();

            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            if ($data['tipoMov'] == "D") {
                $data['valor'] = ($data['valor']) * (-1);
            }

            Movimento::create($data);
            return redirect()->route('movimento.index');
        }
        $usuario = auth()->user()->name;
        return view('movimentos.create', compact('findConta', 'findCategoria','usuario'));
    }

    public function atualizarMovimento(FormRequestMovimento $request, $id)
    {
        $findConta = Conta::all();
        $findCategoria = Categoria::all();
        if ($request->method() == "PUT") {
            //atualiza os dados
            $data = $request->all();

            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Movimento::find($id);
            if ($data['tipoMov'] == "D") {
                $data['valor'] = ($data['valor']) * (-1);
            }

            $buscaRegistro->update($data);
            return redirect()->route('movimento.index');
        }
        $findMovimento = Movimento::where('id', '=', $id)->first();
        if ($findMovimento['valor'] < 0) {
            $findMovimentoValor = ($findMovimento['valor']) * (-1);
        } else {
            $findMovimentoValor = ($findMovimento['valor']);
        }
        $usuario = auth()->user()->name;
        return view('movimentos.atualiza', compact('findMovimento', 'findConta', 'findCategoria', 'findMovimentoValor','usuario'));
    }
}
