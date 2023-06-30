<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Movimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_mov',
        'descricao',
        'conta_id',
        'categoria_id',
        'valor',
    ];

    public  function conta(){
        return $this->belongsTo(Conta::class);
    }

    public  function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function getMovimentosPesquisaIndex(string $search = '', string $idConta = '', string $from = '', string $to = '')
    {
        
        Paginator::useBootstrap();

        if ($from != '' && $idConta != ''){
            $movimento = $this->whereBetween('data_mov', [$from, $to])->where('conta_id', $idConta)->orderBy('data_mov', 'ASC')->orderBy('descricao','ASC')->paginate(15);
            return $movimento;
        }

        if ($from != ''){    
            $movimento = $this->whereBetween('data_mov', [$from, $to])->orderBy('data_mov', 'ASC')->orderBy('descricao','ASC')->paginate(15);
            return $movimento;
        }

        if ($idConta != ''){
          $movimento = $this->where(function($query) use($idConta){
            $query->where('conta_id', $idConta);
          })->orderBy('data_mov', 'ASC')->orderBy('descricao','ASC')->paginate(15);
            return $movimento;
        }
        $movimento = $this->where(function($query) use($search){
            $query->where('descricao', $search);
            $query->orwhere('descricao', 'LIKE', "%{$search}%");
            
        })->orderBy('data_mov', 'ASC')->orderBy('descricao','ASC')->paginate(15);

        return $movimento;
    }
}