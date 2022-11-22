<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address_emprestimo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_livro',
        'id_aluno',
    ];
    public function emprestimos(){
        return $this->belongsToMany('App\Models\Livros');
    }    
    public function emprestimoAlunoLivro(){
        return $this->belongsToOne('App\Models\Address');
    }
}
