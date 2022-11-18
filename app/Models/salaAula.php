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
