<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dados__aula__por__aluno extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_aluno',
        'id_materia',
        'qtd_falta_geral',
        'qtd_falta_Um',
        'qtd_falta_Dois',
        'qtd_falta_Tres',
        'qtd_falta_Quatro',
        'notaUm',
        'notaDois',
        'notaTres',
        'notaQuatro',
        'situacao',
    ];
}
