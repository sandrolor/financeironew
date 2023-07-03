<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function getCategoriasPesquisaIndex(string $search = '')
    {
        Paginator::useBootstrap();
        $categoria = $this->where(function ($query) use ($search) {
            $query->where('nome', $search);
            $query->orwhere('nome', 'LIKE', "%{$search}%");
        })->orderBy('nome')->paginate(5);

        return $categoria;
    }
}
