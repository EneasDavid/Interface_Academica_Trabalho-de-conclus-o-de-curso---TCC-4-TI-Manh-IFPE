<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\User;
use App\Models\address;
use App\Models\professor;
use App\Models\salaAula;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function cadastrarTestes()
    {
        $novoADM = new User;
        $novoEstudante = new User;
        $novoDiscente = new User;
        $novoAluno = new address;
        $novoProfessor = new professor;
        $novoAlunoTurmaA = new salaAula;
        $novoAlunoTurmaB = new salaAula;
        $novoAlunoTurmaC = new salaAula;
        $novoAlunoTurmaD = new salaAula;
        $novoAlunoTurmaE = new salaAula;
        $novoAlunoTurmaF = new salaAula;
        $novoAlunoTurmaG = new salaAula;
        $novoAlunoTurmaH = new salaAula;
        $novoAlunoTurmaI = new salaAula;
        $novoAlunoTurmaJ = new salaAula;
        $novoAlunoTurmaK = new salaAula;
        $novoAlunoTurmaL = new salaAula;
        $novoAlunoTurmaM = new salaAula;
        $novoAlunoTurmaN = new salaAula;
        $novoAlunoTurmaO = new salaAula;
        $novoAlunoTurmaP = new salaAula;
        $novoAlunoTurmaQ = new salaAula;
        $novoAlunoTurmaR = new salaAula;
        $novoAlunoTurmaS = new salaAula;
        $novoAlunoTurmaT = new salaAula;
       
        //Inicio criar sala de aula
            //1° TI Manhã
                $novoAlunoTurmaA->curso='TI';
                $novoAlunoTurmaA->serie=1;
                $novoAlunoTurmaA->turno='Manhã';
                $novoAlunoTurmaA->save();
            //2° TI Manhã
                $novoAlunoTurmaB->curso='TI';
                $novoAlunoTurmaB->serie=2;
                $novoAlunoTurmaB->turno='Manhã';
                $novoAlunoTurmaB->save();
            //3° TI Manhã
                $novoAlunoTurmaC->curso='TI';
                $novoAlunoTurmaC->serie=3;
                $novoAlunoTurmaC->turno='Manhã';
                $novoAlunoTurmaC->save();
            //4° TI Manhã
                $novoAlunoTurmaD->curso='TI';
                $novoAlunoTurmaD->serie=4;
                $novoAlunoTurmaD->turno='Manhã';
                $novoAlunoTurmaD->save();
            //1° TI Tarde
                $novoAlunoTurmaE->curso='TI';
                $novoAlunoTurmaE->serie=1;
                $novoAlunoTurmaE->turno='Tarde';
                $novoAlunoTurmaE->save();
            //2° TI Tarde
                $novoAlunoTurmaF->curso='TI';
                $novoAlunoTurmaF->serie=2;
                $novoAlunoTurmaF->turno='Tarde';
                $novoAlunoTurmaF->save();
            //3° TI Tarde
                $novoAlunoTurmaG->curso='TI';
                $novoAlunoTurmaG->serie=3;
                $novoAlunoTurmaG->turno='Tarde';
                $novoAlunoTurmaG->save();
            //4° TI Tarde
                $novoAlunoTurmaH->curso='TI';
                $novoAlunoTurmaH->serie=4;
                $novoAlunoTurmaH->turno='Tarde';
                $novoAlunoTurmaH->save();
             //1° TMA Manhã
                $novoAlunoTurmaI->curso='TMA';
                $novoAlunoTurmaI->serie=1;
                $novoAlunoTurmaI->turno='Manhã';
                $novoAlunoTurmaI->save();
            //2° TMA Manhã
                $novoAlunoTurmaJ->curso='TMA';
                $novoAlunoTurmaJ->serie=2;
                $novoAlunoTurmaJ->turno='Manhã';
                $novoAlunoTurmaJ->save();
            //3° TMA Manhã
                $novoAlunoTurmaK->curso='TMA';
                $novoAlunoTurmaK->serie=3;
                $novoAlunoTurmaK->turno='Manhã';
                $novoAlunoTurmaK->save();
            //4° TMA Manhã
                $novoAlunoTurmaL->curso='TMA';
                $novoAlunoTurmaL->serie=4;
                $novoAlunoTurmaL->turno='Manhã';
                $novoAlunoTurmaL->save();
            //1° TMA Tarde
                $novoAlunoTurmaM->curso='TMA';
                $novoAlunoTurmaM->serie=1;
                $novoAlunoTurmaM->turno='Tarde';
                $novoAlunoTurmaM->save();
            //2° TMA Tarde
                $novoAlunoTurmaN->curso='TMA';
                $novoAlunoTurmaN->serie=2;
                $novoAlunoTurmaN->turno='Tarde';
                $novoAlunoTurmaN->save();
            //3° TMA Tarde
                $novoAlunoTurmaO->curso='TMA';
                $novoAlunoTurmaO->serie=3;
                $novoAlunoTurmaO->turno='Tarde';
                $novoAlunoTurmaO->save();
            //4° TMA Tarde
                $novoAlunoTurmaP->curso='TMA';
                $novoAlunoTurmaP->serie=4;
                $novoAlunoTurmaP->turno='Tarde';
                $novoAlunoTurmaP->save();
            //1° TEE Manhã
               $novoAlunoTurmaQ->curso='TEE';
               $novoAlunoTurmaQ->serie=1;
               $novoAlunoTurmaQ->turno='Manhã';
               $novoAlunoTurmaQ->save();
           //2° TEE Manhã
               $novoAlunoTurmaR->curso='TEE';
               $novoAlunoTurmaR->serie=2;
               $novoAlunoTurmaR->turno='Manhã';
               $novoAlunoTurmaR->save();
           //3° TEE Manhã
               $novoAlunoTurmaS->curso='TEE';
               $novoAlunoTurmaS->serie=3;
               $novoAlunoTurmaS->turno='Manhã';
               $novoAlunoTurmaS->save();
           //4° TEE Manhã
               $novoAlunoTurmaT->curso='TEE';
               $novoAlunoTurmaT->serie=4;
               $novoAlunoTurmaT->turno='Manhã';
               $novoAlunoTurmaT->save();
        //Fim criar sala de aula

        //Inicio criar ADM
            $novoADM->name = 'Pedro Antônio';
            $novoADM->email = 'test@test.com';
            $novoADM->matricula = '111';
            $novoADM->password = Hash::make('.');
            $novoADM->save();
        //Fim criar ADM

        //Inicio criar Aluno
            //Aluno
            $novoEstudante->name = 'Emanuele Maria';
            $novoEstudante->email = 'emanuele@maria.com';
            $novoEstudante->matricula = '20191D12GR0617';
            $novoEstudante->password = Hash::make('.');
            $novoEstudante->save();
            $novoAluno->sexo='f';
            $novoAluno->nivelAcesso=2;
            $novoAluno->estadoCivil='solteiro';
            $novoAluno->nomeMae='Paula';
            $novoAluno->TipoSanguineo='';
            $novoAluno->dataNascimento='2004-04-20';
            $novoAluno->naturalidade='brasileira';
            $novoAluno->nomeUsual='';
            $novoAluno->etnia='branco';
            $novoAluno->rg='111222333';
            $novoAluno->rgExpedicao='2018-12-03';
            $novoAluno->ufExpeditor='PE';
            $novoAluno->expeditorRg='SDS';
            $novoAluno->cpf=11122233345;
            $novoAluno->numeroCelular=3234234234234;
            $novoAluno->cep=55700-000;
            $novoAluno->UF='PE';
            $novoAluno->cidade='Limoeiro';
            $novoAluno->bairro='Centro';
            $novoAluno->rua='Baixa da Égua';
            $novoAluno->numeroCasa='69';
            $novoAluno->complementoCasa='';
            $novoAluno->grauInstrucao='Aluna';
            $novoAluno->turno='Manhã';
            $novoAluno->anoIngreso=19;
            $novoAluno->anoCurso=4;
            $novoAluno->curso='TI';
            $novoAlunoTurma=salaAula::where('curso',$novoAluno->curso)->where('serie',$novoAluno->anoCurso)->where('turno',$novoAluno->turno)->first();
            $novoAluno->id_usuario_to_aluno=$novoEstudante->id;
            $novoAluno->id_salaAula=$novoAlunoTurma->id;
            $novoAluno->save();
        
        //Fim criar Aluno
        
        //Inicio criar Professor
            $novoDiscente->name = 'David Enéas';
            $novoDiscente->email = 'david@eneas.com';
            $novoDiscente->matricula = '332255';
            $novoDiscente->password = Hash::make('.');
            $novoDiscente->save();
            $novoProfessor->sexo='M';
            $novoProfessor->nivelAcesso=3;
            $novoProfessor->estadoCivil='Solteiro';
            $novoProfessor->nomeMae='Sandra Enéas';
            $novoProfessor->TipoSanguineo='B-';
            $novoProfessor->dataNascimento='2004-12-03';
            $novoProfessor->naturalidade='brasileiro';
            $novoProfessor->nomeUsual='';
            $novoProfessor->etnia='pardo';
            $novoProfessor->rg='111222333';
            $novoProfessor->rgExpedicao='2018-12-03';
            $novoProfessor->ufExpeditor='PE';
            $novoProfessor->expeditorRg='SDS';
            $novoProfessor->cpf=22211133345;
            $novoProfessor->numeroCelular=3234234234234;
            $novoProfessor->cep=57035060;
            $novoProfessor->UF='AL';
            $novoProfessor->cidade='Maceio';
            $novoProfessor->bairro='Ponta Verda';
            $novoProfessor->rua='Durval Guimar~es';
            $novoProfessor->numeroCasa='904';
            $novoProfessor->complementoCasa='Apartamento';
            $novoProfessor->grauInstrucao='graduacao';
            $novoProfessor->profissao='professor';
            $novoProfessor->modalidade='efetivo';
            $novoProfessor->categoria='Professor';
            $novoProfessor->id_usuario_to_professors=$novoDiscente->id;
            $novoProfessor->save();
        //Fim criar Professor

        return redirect('/');
    }
}
