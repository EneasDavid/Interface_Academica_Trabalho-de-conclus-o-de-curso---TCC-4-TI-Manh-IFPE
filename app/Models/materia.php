<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materia extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_professor',
        'nomeMateria',
    ];
    public function salaAulaMateria(){
        return $this->belongsTo('App\Models\salaAula');
    }
    public function MateriaProfessor(){
        return $this->belongsTo('App\Models\Professor');
    }
}
