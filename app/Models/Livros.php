<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;
    protected $fillable = [
        'autor',
        'titulo',
        'edicao',
        'volume',
        'qtd_disponivel',
    ];
    public function emprestimoLivro(){
        return $this->belongsTo('App\Models\emprestimo');
    }
}
