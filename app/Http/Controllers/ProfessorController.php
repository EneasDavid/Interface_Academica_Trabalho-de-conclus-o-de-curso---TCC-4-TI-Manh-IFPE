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
use App\Models\dados__aula__por__aluno;
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

         $salaAula=salaAula::all();
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
         $entidades=user::all();
         $informacoes=dados__aula__por__aluno::all();
         $unidadeTela=request('unidade'); 
         if(empty($alunos))
         {
             return redirect('/turma/'.$id.'');
         }
         elseif(!empty($unidadeTela) && !empty($alunos)){
            return view('Professor.frequencia',['sala'=>$salaDeAula,'aluno'=>$alunos,'entidade'=>$entidades,'dadosAluno'=>$informacoes,'unidadeTela'=>$unidadeTela]);
         }
         return view('Professor.frequencia',['sala'=>$salaDeAula,'aluno'=>$alunos,'entidade'=>$entidades,'dadosAluno'=>$informacoes,'unidadeTela'=>'qtd_falta_Um']);
    }
    public function TurmaChamada(Request $request)
    {
        $this->validate($request,[
            'unidade'=>'required'
        ],[
            'unidade.required'=>'O campo Unidade é obrigatorio',
        ]);
        $unidade=$request->unidade;
        $dadosAluno=$request->aluno;
        $dados=dados__aula__por__aluno::all();
        foreach($dados as $aula)
        {
            $faltaTotais=$aula->qtd_falta_geral;
            if($aula->id==$dadosAluno)
            {
                dados__aula__por__aluno::where('id_aluno',$dadosAluno)->update([
                    'qtd_falta_geral'=>$aula->qtd_falta_Um+$aula->qtd_falta_Dois+$aula->qtd_falta_Tres+$aula->qtd_falta_Quatro+$request->faltas,
                    $unidade=>$aula->$unidade+$request->faltas,
                ]);
            }
        }
        return redirect('/homeProfessor');
    }
    public function TurmaMateriaInserirNota($id)
    {
         $salaDeAula=salaAula::findOrFail($id);
         $alunos=address::where([['id_salaAula','like',$id]])->get();
         $entidades=user::all();
         $informacoes=dados__aula__por__aluno::all();
         if(empty($alunos))
         {
             return redirect('/turma/'.$id.'');
         }
         return view('Professor.postarNotas',['sala'=>$salaDeAula,'aluno'=>$alunos,'entidade'=>$entidades,'dadosAluno'=>$informacoes]);
    }
    public function InserirNota(Request $request)
    {
        $this->validate($request,[
            'unidade'=>'required'
        ],[
            'unidade.required'=>'O campo Unidade é obrigatorio',
        ]);
        $unidade=$request->unidade;
        $dadosAluno=$request->aluno;
        $dados=dados__aula__por__aluno::all();
        foreach($dados as $aula)
        {
            if($aula->id==$dadosAluno)
            {
                dados__aula__por__aluno::findOrFail($dadosAluno)->update([
                    $unidade=>$request->nota,
                ]);
                if(($aula->notaUm+$aula->notaDois+$aula->notaTres+$aula->notaQuatro)/4>=6)
                {
                    $situacao=1;
                }else{
                    $situacao=0;
                }
                dados__aula__por__aluno::findOrFail($dadosAluno)->update([
                    'situacao'=>$situacao,
                ]);
            }
        }
        return redirect('/homeProfessor');
    }
}
