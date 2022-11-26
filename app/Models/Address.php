<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = 
        [
            'estadoCivil',
            'nomeMae',
            'curso',
            'turmaAlunos',
            'TipoSanguineo',
            'dataNascimento',
            'naturalidade',
            'nomeUsual',
            'etnia',
            'rg',
            'rgExpedicao',
            'ufExpeditor',
            'expeditorRg',
            'cpf',
            'numeroCelular',
            'UF',
            'turno',
            'cep',
            'cidade',
            'bairro',
            'rua',
            'numeroCasa',
            'complementoCasa',
            'nivelAcesso',
            'grauInstrucao',
            'foto',
            'salaAula',
        ];
        public function user(){
            return $this->belongsTo('App\Models\User');
        }
        public function salaAulaAluno(){
            return $this->hasOne('App\Models\salaAula');
        }
        
        public function emprestimoAlunoLivro(){
            return $this->belongsToMany('App\Models\Livros');
        }
}
