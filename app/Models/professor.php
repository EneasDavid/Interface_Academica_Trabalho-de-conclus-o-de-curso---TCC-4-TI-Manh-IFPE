<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    use HasFactory;
    protected $fillable = [
        'estadoCivil',
        'nomeMae',
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
        ];
        public function user(){
            return $this->belongsTo('App\Models\User');
        }
        public function salaAulaProfessor(){
            return $this->belongsToMany('App\Models\salaAula');
        }
}
