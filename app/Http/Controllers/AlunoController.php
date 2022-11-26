<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\address;
use App\Models\materia;
use App\Models\salaAula;
use App\Models\professor;
use App\Models\Livros;


class AlunoController extends Controller
{
    public function indexAluno()
    {
        return view('Aluno.loginAluno');
    }
    public function loginAluno(Request $request)
    {
        $this->validate($request,[
            'matricula'=>'required',
            'password'=>'required'
        ],[
            'matricula.required'=>'O campo Matrícula é obrigatorio',
            'password.required'=>'O campo Senha é obrigatorio',
        ]);
        $aluno=User::where('matricula',$request->matricula)->first(); 
        if($aluno && Hash::check($request->password,$aluno->password)){
            Auth::loginUsingId($aluno->id);
            return redirect('/homeAluno');
        }else{
            return redirect()->back()->with('danger','Matricula ou senha invalida!');
        }
    }
    //after login
    public function homeAluno()
    {
         $entidade=auth()->user();
         $aluno=Address::where('id_usuario_to_aluno',$entidade->id)->first();
         //Aulas da segunda
         $salaAluno=salaAula::where('id',$aluno->id_salaAula)->first();
         if(!empty($salaAluno)){
             $segundaAulaUm=materia::where('id',$salaAluno->segundaUm)->first();
             if(!empty($segundaAulaUm)){
                 $procurarProfessor=professor::where('id',$segundaAulaUm->id_professor)->first();
                 $professorSegundaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
            }else{
                 $professorSegundaUm=null;
            }
            $segundaAulaDois=materia::where('id',$salaAluno->segundaDois)->first();
            if(!empty($segundaAulaDois)){
                     $procurarProfessor=professor::where('id',$segundaAulaDois->id_professor)->first();
                     $professorSegundaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                    $professorSegundaDois=null;
                }
                $segundaAulaTres=materia::where('id',$salaAluno->segundaTres)->first();
                if(!empty($segundaAulaTres)){
                     $procurarProfessor=professor::where('id',$segundaAulaTres->id_professor)->first();
                     $professorSegundaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                    $professorSegundaTres=null;
                }
                $segundaAulaQuatro=materia::where('id',$salaAluno->segundaQuatro)->first();
                if(!empty($segundaAulaQuatro)){
                     $procurarProfessor=professor::where('id',$segundaAulaQuatro->id_professor)->first();
                     $professorSegundaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                    $professorSegundaQuatro=null;
                }
                $segundaAulaCinco=materia::where('id',$salaAluno->segundaCinco)->first();
                if(!empty($segundaAulaCinco)){
                     $procurarProfessor=professor::where('id',$segundaAulaCinco->id_professor)->first();
                     $professorSegundaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                    $professorSegundaCinco=null;
                }
                $segundaAulaSeis=materia::where('id',$salaAluno->segundaSeis)->first();
                if(!empty($segundaAulaSeis)){
                     $procurarProfessor=professor::where('id',$segundaAulaSeis->id_professor)->first();
                     $professorSegundaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                    $professorSegundaSeis=null;
                }
                //Aulas da terca
                $tercaAulaUm=materia::where('id',$salaAluno->tercaUm)->first();
                if(!empty($tercaAulaUm)){
                     $procurarProfessor=professor::where('id',$tercaAulaUm->id_professor)->first();
                     $professorTercaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorTercaUm=null;
                }
                $tercaAulaDois=materia::where('id',$salaAluno->tercaDois)->first();
                if(!empty($tercaAulaDois)){
                     $procurarProfessor=professor::where('id',$tercaAulaDois->id_professor)->first();
                     $professorTercaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorTercaDois=null;
                }
                $tercaAulaTres=materia::where('id',$salaAluno->tercaTres)->first();
                if(!empty($tercaAulaTres)){
                     $procurarProfessor=professor::where('id',$tercaAulaTres->id_professor)->first();
                     $professorTercaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorTercaTres=null;
                }
                $tercaAulaQuatro=materia::where('id',$salaAluno->tercaQuatro)->first();
                if(!empty($tercaAulaQuatro)){
                     $procurarProfessor=professor::where('id',$tercaAulaQuatro->id_professor)->first();
                     $professorTercaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorTercaQuatro=null;
                }
                $tercaAulaCinco=materia::where('id',$salaAluno->tercaCinco)->first();
                if(!empty($tercaAulaCinco)){
                     $procurarProfessor=professor::where('id',$tercaAulaCinco->id_professor)->first();
                     $professorTercaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorTercaCinco=null;
                }
                $tercaAulaSeis=materia::where('id',$salaAluno->tercaSeis)->first();
                if(!empty($tercaAulaSeis)){
                     $procurarProfessor=professor::where('id',$tercaAulaSeis->id_professor)->first();
                     $professorTercaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorTercaSeis=null;
                }
                //Aulas da quarta
                $quartaAulaUm=materia::where('id',$salaAluno->quartaUm)->first();
                if(!empty($quartaAulaUm)){
                     $procurarProfessor=professor::where('id',$quartaAulaUm->id_professor)->first();
                     $professorQuartaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuartaUm=null;
                }
                $quartaAulaDois=materia::where('id',$salaAluno->quartaDois)->first();
                if(!empty($quartaAulaDois)){
                     $procurarProfessor=professor::where('id',$quartaAulaDois->id_professor)->first();
                     $professorQuartaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuartaDois=null;
                }
                $quartaAulaTres=materia::where('id',$salaAluno->quartaTres)->first();
                if(!empty($quartaAulaTres)){
                     $procurarProfessor=professor::where('id',$quartaAulaTres->id_professor)->first();
                     $professorQuartaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuartaTres=null;
                }
                $quartaAulaQuatro=materia::where('id',$salaAluno->quartaQuatro)->first();
                if(!empty($quartaAulaQuatro)){
                     $procurarProfessor=professor::where('id',$quartaAulaQuatro->id_professor)->first();
                     $professorQuartaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuartaQuatro=null;
                }
                $quartaAulaCinco=materia::where('id',$salaAluno->quartaCinco)->first();
                if(!empty($quartaAulaCinco)){
                     $procurarProfessor=professor::where('id',$quartaAulaCinco->id_professor)->first();
                     $professorQuartaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuartaCinco=null;
                }
                $quartaAulaSeis=materia::where('id',$salaAluno->quartaSeis)->first();
                if(!empty($quartaAulaSeis)){
                     $procurarProfessor=professor::where('id',$quartaAulaSeis->id_professor)->first();
                     $professorQuartaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuartaSeis=null;
                }
            //Aulas da quinta
            $quintaAulaUm=materia::where('id',$salaAluno->quintaUm)->first();
                if(!empty($quintaAulaUm)){
                     $procurarProfessor=professor::where('id',$quintaAulaUm->id_professor)->first();
                     $professorQuintaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuintaUm=null;
                }
                $quintaAulaDois=materia::where('id',$salaAluno->quintaDois)->first();
                if(!empty($quintaAulaDois)){
                     $procurarProfessor=professor::where('id',$quintaAulaDois->id_professor)->first();
                     $professorQuintaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuintaDois=null;
                }
                $quintaAulaTres=materia::where('id',$salaAluno->quintaTres)->first();
                if(!empty($quintaAulaTres)){
                     $procurarProfessor=professor::where('id',$quintaAulaTres->id_professor)->first();
                     $professorQuintaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuintaTres=null;
                }
                $quintaAulaQuatro=materia::where('id',$salaAluno->quintaQuatro)->first();
                if(!empty($quintaAulaQuatro)){
                     $procurarProfessor=professor::where('id',$quintaAulaQuatro->id_professor)->first();
                     $professorQuintaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuintaQuatro=null;
                }
                $quintaAulaCinco=materia::where('id',$salaAluno->quintaCinco)->first();
                if(!empty($quintaAulaCinco)){
                     $procurarProfessor=professor::where('id',$quintaAulaCinco->id_professor)->first();
                     $professorQuintaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuintaCinco=null;
                }
                $quintaAulaSeis=materia::where('id',$salaAluno->quintaSeis)->first();
                if(!empty($quintaAulaSeis)){
                     $procurarProfessor=professor::where('id',$quintaAulaSeis->id_professor)->first();
                     $professorQuintaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorQuintaSeis=null;
                }
            //Aulas da Sexta
            $sextaAulaUm=materia::where('id',$salaAluno->sextaUm)->first();
                if(!empty($sextaAulaUm)){
                     $procurarProfessor=professor::where('id',$sextaAulaUm->id_professor)->first();
                     $professorSextaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorSextaUm=null;
                }
                $sextaAulaDois=materia::where('id',$salaAluno->sextaDois)->first();
                if(!empty($sextaAulaDois)){
                     $procurarProfessor=professor::where('id',$sextaAulaDois->id_professor)->first();
                     $professorSextaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorSextaDois=null;
                }
                $sextaAulaTres=materia::where('id',$salaAluno->sextaTres)->first();
                if(!empty($sextaAulaTres)){
                     $procurarProfessor=professor::where('id',$sextaAulaTres->id_professor)->first();
                     $professorSextaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorSextaTres=null;
                }
                $sextaAulaQuatro=materia::where('id',$salaAluno->sextaQuatro)->first();
                if(!empty($sextaAulaQuatro)){
                     $procurarProfessor=professor::where('id',$sextaAulaQuatro->id_professor)->first();
                     $professorSextaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorSextaQuatro=null;
                }
                $sextaAulaCinco=materia::where('id',$salaAluno->sextaCinco)->first();
                if(!empty($sextaAulaCinco)){
                     $procurarProfessor=professor::where('id',$sextaAulaCinco->id_professor)->first();
                     $professorSextaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorSextaCinco=null;
                }
                $sextaAulaSeis=materia::where('id',$salaAluno->sextaSeis)->first();
                if(!empty($sextaAulaSeis)){
                     $procurarProfessor=professor::where('id',$sextaAulaSeis->id_professor)->first();
                     $professorSextaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                }else{
                     $professorSextaSeis=null;
                }
        }
            return view('Aluno.homeAluno',['aluno'=>$aluno,'entidade'=>$entidade, 'sala'=>$salaAluno,
                       //Aulas e professores da Segunda
                        'aulaUmSegunda'=>$segundaAulaUm,
                        'professorUmSegunda'=>$professorSegundaUm,
                        'aulaDoisSegunda'=>$segundaAulaDois,
                        'professorDoisSegunda'=>$professorSegundaDois,
                        'aulaTresSegunda'=>$segundaAulaTres,
                        'professorTresSegunda'=>$professorSegundaTres,
                        'aulaQuatroSegunda'=>$segundaAulaQuatro,
                        'professorQuatroSegunda'=>$professorSegundaQuatro,
                        'aulaCincoSegunda'=>$segundaAulaCinco,
                        'professorCincoSegunda'=>$professorSegundaCinco,
                        'aulaSeisSegunda'=>$segundaAulaSeis,
                        'professorSeisSegunda'=>$professorSegundaSeis,
                        //Aulas e professores da Terça
                        'aulaUmTerca'=>$tercaAulaUm,
                        'professorUmTerca'=>$professorTercaUm,
                        'aulaDoisTerca'=>$tercaAulaDois,
                        'professorDoisTerca'=>$professorTercaDois,
                        'aulaTresTerca'=>$tercaAulaTres,
                        'professorTresTerca'=>$professorTercaTres,
                        'aulaQuatroTerca'=>$tercaAulaQuatro,
                        'professorQuatroTerca'=>$professorTercaQuatro,
                        'aulaCincoTerca'=>$tercaAulaCinco,
                        'professorCincoTerca'=>$professorTercaCinco,
                        'aulaSeisTerca'=>$tercaAulaSeis,
                        'professorSeisTerca'=>$professorTercaSeis,
                        //Aulas e professores da Quarta
                        'aulaUmQuarta'=>$quartaAulaUm,
                        'professorUmQuarta'=>$professorQuartaUm,
                        'aulaDoisQuarta'=>$quartaAulaDois,
                        'professorDoisQuarta'=>$professorQuartaDois,
                        'aulaTresQuarta'=>$quartaAulaTres,
                        'professorTresQuarta'=>$professorQuartaTres,
                        'aulaQuatroQuarta'=>$quartaAulaQuatro,
                        'professorQuatroQuarta'=>$professorQuartaQuatro,
                        'aulaCincoQuarta'=>$quartaAulaCinco,
                        'professorCincoQuarta'=>$professorQuartaCinco,
                        'aulaSeisQuarta'=>$quartaAulaSeis,
                        'professorSeisQuarta'=>$professorQuartaSeis,
                        //Aulas e professores da Quinta
                        'aulaUmQuinta'=>$quintaAulaUm,
                        'professorUmQuinta'=>$professorQuintaUm,
                        'aulaDoisQuinta'=>$quintaAulaDois,
                        'professorDoisQuinta'=>$professorQuintaDois,
                        'aulaTresQuinta'=>$quintaAulaTres,
                        'professorTresQuinta'=>$professorQuintaTres,
                        'aulaQuatroQuinta'=>$quintaAulaQuatro,
                        'professorQuatroQuinta'=>$professorQuintaQuatro,
                        'aulaCincoQuinta'=>$quintaAulaCinco,
                        'professorCincoQuinta'=>$professorQuintaCinco,
                        'aulaSeisQuinta'=>$quintaAulaSeis,
                        'professorSeisQuinta'=>$professorQuintaSeis,
                        //Aulas e professores da Sexta
                        'aulaUmSexta'=>$sextaAulaUm,
                        'professorUmSexta'=>$professorSextaUm,
                        'aulaDoisSexta'=>$sextaAulaDois,
                        'professorDoisSexta'=>$professorSextaDois,
                        'aulaTresSexta'=>$sextaAulaTres,
                        'professorTresSexta'=>$professorSextaTres,
                        'aulaQuatroSexta'=>$sextaAulaQuatro,
                        'professorQuatroSexta'=>$professorSextaQuatro,
                        'aulaCincoSexta'=>$sextaAulaCinco,
                        'professorCincoSexta'=>$professorSextaCinco,
                        'aulaSeisSexta'=>$sextaAulaSeis,
                        'professorSeisSexta'=>$professorSextaSeis,
        ]);
    }
    public function calendarioA()
    {
        return view('Aluno.calendarioAcademico');
    }
    public function acervoBiblioteca()
     {
             $busca=request('search'); 
             if($busca){
                 if(!empty(User::where('titulo', 'like', '%'.$busca.'%')->first())){
                        $livros=Livros::where([
                        ['titulo', 'like', '%'.$busca.'%']
                        ])->get();
                    }elseif(!empty(User::where('autor', 'like', '%'.$busca.'%')->first())){
                         $livros=Livros::where([
                         ['name', 'like', '%'.$busca.'%']
                     ])->get();
                 }
             }else{
                 $livros=Livros::all();
             }
             return view('Aluno.bibliotecaAluno',['livro'=>$livros,'busca'=>$busca]);
     }
     public function emrpestimo($id)
     {
          $user=auth()->user();
          $aluno=address::where('id_usuario_to_aluno','like',$user->id)->first();
           if(!empty($aluno))
           {
                $aluno->emprestimoAlunoLivro()->attach($id);
                return redirect('/acervoBibliotecaToAluno')->with('erros','emprestimo com sucesso');
           }
     }
     public function alterarSenha()
     {
          return view('Aluno.Senha.recSenhaAffter');
     }
}
