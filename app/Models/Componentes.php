<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
    public function formatacaoMascaraDinheiroDecimal($valorParaFormatar)
    {
        //dd($valorParaFormatar);
        $tamanho = strlen($valorParaFormatar);
        //dd($tamanho);
        $dados = str_replace(',', '.', $valorParaFormatar);
        //dd($dados);
        if ($tamanho <= 6) {
            $dados = str_replace(',', '.', $valorParaFormatar);
        } else {
            if ($tamanho >= 8 && $tamanho <= 10) {
                $retiraVirgulaPorPonto = str_replace(',', '.', $valorParaFormatar);
                $separaPorIndice = explode('.', $retiraVirgulaPorPonto);
                $dados = $separaPorIndice[0] . $separaPorIndice[1];
            }
        }
        return $dados;
    }
}
