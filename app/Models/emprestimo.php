<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emprestimo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_livro',
        'id_aluno',
    ];
    public function emprestimos(){
        return $this->belongsToMany('App\Models\Livros');
    }
}
