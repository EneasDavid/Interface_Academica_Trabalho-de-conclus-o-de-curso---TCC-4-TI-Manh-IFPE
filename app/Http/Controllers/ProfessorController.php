<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function indexProfessor()
    {
        return view('Professor.loginProfessor');
    }
    public function TurmaMateria()
    {
        return view('Professor.turma');
    }
    public function loginProfessor(Request $request)
    {
        $this->validate($request,[
            'matricula'=>'required',
            'password'=>'required'
        ],[
            'matricula.required'=>'O campo Matrícula é obrigatorio',
            'password.required'=>'O campo Senha é obrigatorio',
        ]);
        $professor=User::where('matricula',$request->matricula)->first(); 
        if($professor && Hash::check($request->password,$professor->password)){
            Auth::loginUsingId($professor->id);
            return redirect('/homeProfessor');
        }else{
            return redirect()->back()->with('danger','Matricula ou senha invalida!');
        }
    }
        //after login
        public function homeProfessor()
        {
            $entidade=auth()->user();
            $professor=Professor::where('id_usuario_to_professors',$entidade->id)->first();
            return view('professor.homeProfessor',['professor'=>$professor,'entidade'=>$entidade]);
        }
}
