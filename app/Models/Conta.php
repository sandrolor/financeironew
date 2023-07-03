<?php

namespace App\Models;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function getContasPesquisaIndex(string $search = '')
    {
        Paginator::useBootstrap();
        $conta = $this->where(function ($query) use ($search) {
            $query->where('nome', $search);
            $query->orwhere('nome', 'LIKE', "%{$search}%");
        })->orderBy('nome')->paginate(5);

        return $conta;
    }
}
