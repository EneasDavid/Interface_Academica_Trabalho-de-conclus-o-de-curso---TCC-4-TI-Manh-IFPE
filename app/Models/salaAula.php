<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class salaAula extends Model
{
    use HasFactory;
    protected $fillable = [
        'curso',
        'serie',
        'turno',
        'segundaUm',
        'segundaDois',
        'segundaTres',
        'segundaQuatro',
        'segundaCinco',
        'segundaSeis',
        'tercaUm',
        'tercaDois',
        'tercaTres',
        'tercaQuatro',
        'tercaCinco',
        'tercaSeis',
        'quartaUm',
        'quartaDois',
        'quartaTres',
        'quartaQuatro',
        'quartaCinco',
        'quartaSeis',
        'quintaUm',
        'quintaDois',
        'quintaTres',
        'quintaQuatro',
        'quintaCinco',
        'quintaSeis',
        'sextaUm',
        'sextaDois',
        'sextaTres',
        'sextaQuatro',
        'sextaCinco',
        'sextaSeis',
    ];

    public function professor(){
        return $this->belongsToMany('App\Models\professors');
    }    
    public function aluno(){
        return $this->belongsToMany('App\Models\Adress');
    }
    public function horario(){
        return $this->belongsTo('App\Models\Horarios');
    }
}
