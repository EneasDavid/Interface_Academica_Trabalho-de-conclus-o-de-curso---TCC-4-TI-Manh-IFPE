<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\professor;
use App\Models\salaAula;
use App\Models\materia;
use App\Models\address;
class ProfessorController extends Controller
{
    public function indexProfessor()
    {
        return view('Professor.loginProfessor');
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
         $materia=materia::where([
         ['id_professor','like',$professor->id]
         ])->get();
         $salaAula=salaAula::where('segundaUm',$professor->id)->orWhere('segundaDois',$professor->id)->orWhere('segundaTres',$professor->id)->orWhere('segundaQuatro',$professor->id)->orWhere('segundaCinco',$professor->id)->orWhere('segundaSeis',$professor->id)
         ->orWhere('tercaUm',$professor->id)->orWhere('tercaDois',$professor->id)->orWhere('tercaTres',$professor->id)->orWhere('tercaQuatro',$professor->id)->orWhere('tercaCinco',$professor->id)->orWhere('tercaSeis',$professor->id)
         ->orWhere('quartaUm',$professor->id)->orWhere('quartaDois',$professor->id)->orWhere('quartaTres',$professor->id)->orWhere('quartaQuatro',$professor->id)->orWhere('quartaCinco',$professor->id)->orWhere('quartaSeis',$professor->id)
         ->orWhere('quintaUm',$professor->id)->orWhere('quintaDois',$professor->id)->orWhere('quintaTres',$professor->id)->orWhere('quintaQuatro',$professor->id)->orWhere('quintaCinco',$professor->id)->orWhere('quintaSeis',$professor->id)
         ->orWhere('sextaUm',$professor->id)->orWhere('sextaDois',$professor->id)->orWhere('sextaTres',$professor->id)->orWhere('sextaQuatro',$professor->id)->orWhere('sextaCinco',$professor->id)->orWhere('sextaSeis',$professor->id)
         ->get();
         return view('professor.homeProfessor',['professor'=>$professor,'entidade'=>$entidade,'materia'=>$materia,'salaAula'=>$salaAula]);
    }
    public function TurmaMateria($id)
    {
        $salaDeAula=salaAula::findOrFail($id); 
        return view('Professor.turma',['sala'=>$salaDeAula]);
    }
    public function TurmaMateriaChamada($id)
    {
        $salaDeAula=salaAula::findOrFail($id);
        $alunos=address::where([['id_salaAula','like',$id]])->get();
        if(count($alunos)==0){
            $alunos=null;
            $entidades=null;
        }else{
            foreach ($alunos as $aluno){
                $entidades=user::where([
                    ['id', 'like', $aluno->id_usuario_to_aluno]
                    ])->get();
                } 
            }
            if(!empty($entidades))
            {
                return view('Professor.frequencia',['sala'=>$salaDeAula,'aluno'=>$alunos,'entidade'=>$entidades]);
            }else{
                return redirect('/turma/'.$id.'');
            }
    }
}
