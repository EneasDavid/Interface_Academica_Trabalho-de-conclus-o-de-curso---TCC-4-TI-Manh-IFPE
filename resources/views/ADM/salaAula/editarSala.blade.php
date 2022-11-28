<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/style.css" rel="stylesheet">
        <title>Sistema Acadêmico</title>
    </head>
<body>
    <div style="display: flex;">
        <a href="/editarTurma"><img src="/img/voltar.png" alt="clique para voltar" height="21px"></a>
        <h4 style="padding-left: 55px">Home</h4>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            @if(!empty($turma))
            <a href="/dadosTurma/listarAlunos/{{$turma->id}}">
                <div class="container" style="display: flex;">
                    <div class="row" style="width: -webkit-fill-available;">
                        <div class="col-sm-3" style="width: inherit;">
                            <div class="turma midlle2">
                                <div class="">
                                    <h1>Alunos</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/dadosTurma/listarProfessores/{{$turma->id}}">
                <div class="container" style="display: flex;">
                    <div class="row" style="width: -webkit-fill-available;">
                        <div class="col-sm-3" style="width: inherit;">
                            <div class="turma midlle2" >
                                <div class="" style="    padding: 0.4rem;">
                                    <h1>Professores</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
        </div>
        <div class="modal pagina input" id="modalExemplo" tabindex="-1" role="dialog" style="margin: 0!important;" aria-labelledby="exampleModalLabel" aria-hidden="true" popUp-cadastrar-tag>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Aula </h5>
                            </div>
                            <div class="modal-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('danger'))
                                <div class="alert alert-danger">
                                    {{ session('danger') }}
                                </div>
                            @endif
                            <form class="container" action="{{route('ADM.cadastrarLivro')}}" style="display: grid;justify-items: center;justify-content: space-around;"method="POST">
                             @csrf      
                                <select name="materiaAula" style="width: inherit;" id="Base_Combobox">
                                        <option disabled selected value="">Matéria</option>
                                        <?php
                                            foreach($materiaCadastradas as $materia)
                                            {
                                                foreach($professores as $professor)
                                                {
                                                    foreach($entidade as $entidades)
                                                    {
                                                        if($professor->id_usuario_to_professors==$entidades->id)
                                                        {
                                                            echo '<option name="materia" value="'.$materia->id.'">'.$materia->nomeMateria.' | '.$entidades->name.'</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                </select>
                                @if($turma->turno=="Manhã")
                                <select name="horarioAula" id="Base_Combobox">
                                        <option disabled selected value="">Horario</option>
                                        <option name="horarioAula" value="segundaUm">Segunda | 07:30~08:14</option>
                                        <option name="horarioAula" value="segundaDois">Segunda | 08:15~08:59</option>
                                        <option name="horarioAula" value="segundaTres">Segunda | 09:00~09:45</option>
                                        <option name="horarioAula" value="segundaQuatro">Segunda | 10:00~10:44</option>
                                        <option name="horarioAula" value="segundaCinco">Segunda | 10:45~11:29</option>
                                        <option name="horarioAula" value="segundaSeis">Segunda | 11:30~12:15</option>
                                        <option name="horarioAula" value="tercaUm">Terca | 07:30~08:14</option>
                                        <option name="horarioAula" value="tercaDois">Terca | 08:15~08:59</option>
                                        <option name="horarioAula" value="tercaTres">Terca | 09:00~09:45</option>
                                        <option name="horarioAula" value="tercaQuatro">Terca | 10:00~10:44</option>
                                        <option name="horarioAula" value="tercaCinco">Terca | 10:45~11:29</option>
                                        <option name="horarioAula" value="tercaSeis">Terca | 11:30~12:15</option>
                                        <option name="horarioAula" value="quartaUm">Quarta | 07:30~08:14</option>
                                        <option name="horarioAula" value="quartaDois">Quarta | 08:15~08:59</option>
                                        <option name="horarioAula" value="quartaTres">Quarta | 09:00~09:45</option>
                                        <option name="horarioAula" value="quartaQuatro">Quarta | 10:00~10:44</option>
                                        <option name="horarioAula" value="quartaCinco">Quarta | 10:45~11:29</option>
                                        <option name="horarioAula" value="quartaSeis">Quarta | 11:30~12:15</option>
                                        <option name="horarioAula" value="quintaUm">Quinta | 07:30~08:14</option>
                                        <option name="horarioAula" value="quintaDois">Quinta | 08:15~08:59</option>
                                        <option name="horarioAula" value="quintaTres">Quinta | 09:00~09:45</option>
                                        <option name="horarioAula" value="quintaQuatro">Quinta | 10:00~10:44</option>
                                        <option name="horarioAula" value="quintaCinco">Quinta | 10:45~11:29</option>
                                        <option name="horarioAula" value="quintaSeis">Quinta | 11:30~12:15</option>
                                        <option name="horarioAula" value="sextaUm">Sexta | 07:30~08:14</option>
                                        <option name="horarioAula" value="sextaDois">Sexta | 08:15~08:59</option>
                                        <option name="horarioAula" value="sextaTres">Sexta | 09:00~09:45</option>
                                        <option name="horarioAula" value="sextaQuatro">Sexta | 10:00~10:44</option>
                                        <option name="horarioAula" value="sextaCinco">Sexta | 10:45~11:29</option>
                                        <option name="horarioAula" value="sextaSeis">Sexta | 11:30~12:15</option>
                                </select>
                                @else
                                <select name="horarioAula" id="Base_Combobox">
                                     <option disabled selected value="">Horario</option>
                                     <option name="horarioAula" value="segundaUm">Segunda | 13:00~13:44</option>
                                     <option name="horarioAula" value="segundaDois">Segunda | 13:45~14:29</option>
                                     <option name="horarioAula" value="segundaTres">Segunda | 14:30~15:15</option>
                                     <option name="horarioAula" value="segundaQuatro">Segunda | 15:30~16:14</option>
                                     <option name="horarioAula" value="segundaCinco">Segunda | 16:15~16:59</option>
                                     <option name="horarioAula" value="segundaSeis">Segunda | 17:00~17:45</option>
                                     <option name="horarioAula" value="tercaUm">Terca | 13:00~13:44</option>
                                     <option name="horarioAula" value="tercaDois">Terca | 13:45~14:29</option>
                                     <option name="horarioAula" value="tercaTres">Terca | 14:30~15:15</option>
                                     <option name="horarioAula" value="tercaQuatro">Terca | 15:30~16:14</option>
                                     <option name="horarioAula" value="tercaCinco">Terca | 16:15~16:59</option>
                                     <option name="horarioAula" value="tercaSeis">Terca | 17:00~17:45</option>
                                     <option name="horarioAula" value="quartaUm">Quarta | 13:00~13:44</option>
                                     <option name="horarioAula" value="quartaDois">Quarta | 13:45~14:29</option>
                                     <option name="horarioAula" value="quartaTres">Quarta | 14:30~15:15</option>
                                     <option name="horarioAula" value="quartaQuatro">Quarta | 15:30~16:14</option>
                                     <option name="horarioAula" value="quartaCinco">Quarta | 16:15~16:59</option>
                                     <option name="horarioAula" value="quartaSeis">Quarta | 17:00~17:45</option>
                                     <option name="horarioAula" value="quintaUm">Quinta | 13:00~13:44</option>
                                     <option name="horarioAula" value="quintaDois">Quinta | 13:45~14:29</option>
                                     <option name="horarioAula" value="quintaTres">Quinta | 14:30~15:15</option>
                                     <option name="horarioAula" value="quintaQuatro">Quinta | 15:30~16:14</option>
                                     <option name="horarioAula" value="quintaCinco">Quinta | 16:15~16:59</option>
                                     <option name="horarioAula" value="quintaSeis">Quinta | 17:00~17:45</option>
                                     <option name="horarioAula" value="sextaUm">Sexta | 13:00~13:44</option>
                                     <option name="horarioAula" value="sextaDois">Sexta | 13:45~14:29</option>
                                     <option name="horarioAula" value="sextaTres">Sexta | 14:30~15:15</option>
                                     <option name="horarioAula" value="sextaQuatro">Sexta | 15:30~16:14</option>
                                     <option name="horarioAula" value="sextaCinco">Sexta | 16:15~16:59</option>
                                     <option name="horarioAula" value="sextaSeis">Sexta | 17:00~17:45</option>
                                   </select>
                                @endif
                                <div style="display:flex">    
                                    <button type="button" style="margin: 1rem;" class="btn btn-secondary" data-dismiss="modal" onclick="removerPopUp()">Cancelar</button>
                                    <button class="btn" type="submit" style="margin: 1rem;">Salvar</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        <div class="col-sm-8">
        <p class="titulo">Horário do {{$turma->serie}}° {{$turma->curso}} {{$turma->turno}}</p>
            <div class="">
                <div class="table-responsive" style="text-align: center;">
                <table class="dia" style="width: 100%; margin: 5px; text-align: center;">
                    <thead>
                        <tr>
                         <th scope="col" class="dia">Hora</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 5px;">
                    @if($turma->turno=='Manhã')
                    <tr>
                        <td>
                            <p1 class="materia">07:30~08:14</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">08:15~08:59</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">09:00~09:45</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">10:00~10:44</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">10:45~11:29</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">11:30~12:15</p1>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>
                            <p1 class="materia">13:00~13:44</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">13:45~14:29</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">14:30~15:15</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">15:30~16:14</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">16:15~16:59</p1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p1 class="materia">17:00~17:45</p1>
                        </td>
                    </tr>
                    @endif
                </table>
                    <table class="dia" style="width: 100%; margin: 5px; text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col" class="dia">Segunda-feira</th>
                            </tr>
                        </thead>
                        <tbody style="margin-top: 5px;">
                            @if(!empty($aulaUmSegunda))
                             <tr>
                                 <td>
                                     <p1 class="materia" id="td" value="segundaUm">{{$aulaUmSegunda->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorUmSegunda->name}}</p1>
                                 </td>
                             </tr>
                            @else
                            <tr id="td" value="segundaUm">
                                <td>
                                     <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                     <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($professorDoisSegunda))
                            <tr id="td" value="segundaDois">
                                 <td>
                                        <p1 class="materia">{{$aulaDoisSegunda->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorDoisSegunda->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr id="td" value="segundaDois">
                                <td>
                                     <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                     <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresSegunda))
                            <tr id="td" value="segundaTres">
                                 <td>
                                        <p1 class="materia">{{$aulaTresSegunda->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorTresSegunda->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr id="td" value="segundaTres">
                                 <td>
                                     <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                     <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroSegunda))
                            <tr id="td" value="segundaQuatro">
                                <td>
                                         <p1 class="materia">{{$aulaQuatroSegunda->nomeMateria}}</p1>
                                         <p1 class="pofessor">{{$professorQuatroSegunda->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr id="td" value="segundaQuatro"> 
                                 <td>
                                     <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                     <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoSegunda))
                            <tr id="td" value="segundaCinco">
                                <td>
                                         <p1 class="materia">{{$aulaCincoSegunda->nomeMateria}}</p1>
                                         <p1 class="pofessor">{{$professorCincoSegunda->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr id="td" value="segundaCinco">
                                 <td>
                                     <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                     <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisSegunda))
                            <tr id="td" value="segundaSeis">
                                <td>
                                        <p1 class="materia">{{$aulaSeisSegunda->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorSeisSegunda->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr id="td" value="segundaSeis">
                                 <td>
                                     <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                     <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>                    
                    <table class="dia" style="width: 100%; margin: 5px; text-align: center;">                        
                        <thead>
                            <tr>
                                 <th scope="col" class="dia">Terça-feira</th>
                             </tr>
                        </thead>
                        <tbody style="margin-top: 5px;">
                            @if(!empty($aulaUmTerca))
                            <tr>
                                <td> 
                                     <p1 class="materia">{{$aulaUmTerca->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorUmTerca->name}}</p1>
                                <td>
                            <tr>
                            @else
                            <tr>
                                <td>
                                     <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                     <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaDoisTerca))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaDoisTerca->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorDoisTerca->name}}</p1>
                                <td>
                            <tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresTerca))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaTresTerca->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorTresTerca->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroTerca))
                            <tr>
                                <td>
                                        <p1 class="materia">{{$aulaQuatroTerca->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorQuatroTerca->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr> 
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoTerca))
                            <tr>
                                <td> 
                                     <p1 class="materia">{{$aulaCincoTerca->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorCincoTerca->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisTerca))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaSeisTerca->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorSeisTerca->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>                    
                    <table class="dia" style="width: 100%; margin: 5px; text-align: center;">
                         <thead>
                            <tr>
                                 <th scope="col" class="dia">Quarta-feira</th>
                             </tr>
                        </thead>
                        <tbody style="margin-top: 5px;">
                            @if(!empty($aulaUmQuarta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaUmQuarta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorUmQuarta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                             <td>
                                 <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                 <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                             </td>
                            </tr>
                            @endif                       
                            @if(!empty($professorDoisQuarta))
                            <tr>
                                <td>                                        
                                     <p1 class="materia">{{$aulaDoisQuarta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorDoisQuarta->name}}</p1>
                                 </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                     <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                     <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresQuarta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaTresQuarta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorTresQuarta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroQuarta))
                            <tr>
                                <td>
                                        <p1 class="materia">{{$aulaQuatroQuarta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorQuatroQuarta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr> 
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoQuarta))
                            <tr>
                                <td>
                                        <p1 class="materia">{{$aulaCincoQuarta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorCincoQuarta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisQuarta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaSeisQuarta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorSeisQuarta->name}}</p1>
                                 </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>                    
                    <table class="dia" style="width: 100%; margin: 5px; text-align: center;">
                         <thead>
                            <tr>
                                 <th scope="col" class="dia">Quinta-feira</th>
                             </tr>
                        </thead>
                        <tbody style="margin-top: 5px;">
                            @if(!empty($aulaUmQuinta))
                            <tr>
                                 <td>
                                     <p1 class="materia">{{$aulaUmQuinta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorUmQuinta->name}}</p1>
                                 </td>
                           </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($professorDoisQuinta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaDoisQuinta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorDoisQuinta->name}}</p1>
                                </td>
                            </tr>
                           @else
                            <tr>
                                 <td>
                                     <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                     <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                 </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresQuinta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaTresQuinta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorTresQuinta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroQuinta))
                            <tr>
                                <td>>
                                        <p1 class="materia">{{$aulaQuatroQuinta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorQuatroQuinta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr> 
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoQuinta))
                            <tr>
                                <td>
                                        <p1 class="materia">{{$aulaCincoQuinta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorCincoQuinta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisQuinta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaSeisQuinta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorSeisQuinta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>                    
                    <table class="dia" style="width: 100%; margin: 5px; text-align: center;">
                         <thead>
                            <tr>
                                 <th scope="col" class="dia">Sexta-feira</th>
                             </tr>
                        </thead>
                        <tbody style="margin-top: 5px;">
                            @if(!empty($aulaUmSexta))
                            <tr>
                             <td>
                                 <p1 class="materia">{{$aulaUmSexta->nomeMateria}}</p1>
                                 <p1 class="pofessor">{{$professorUmSexta->name}}</p1>
                             </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($professorDoisSexta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaDoisSexta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorDoisSexta->name}}</p1>
                                 </td>
                             </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresSexta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaTresSexta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorTresSexta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroSexta))
                            <tr>
                                <td>
                                        <p1 class="materia">{{$aulaQuatroSexta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorQuatroSexta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr> 
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoSexta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaCincoSexta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorCincoSexta->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisSexta))
                            <tr>
                                <td>
                                     <p1 class="materia">{{$aulaSeisSexta->nomeMateria}}</p1>
                                     <p1 class="pofessor">{{$professorSeisSext->name}}</p1>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <button style="float: right;" class="btn" data-salvar onclick="chamaPopUp()">Dicionar aula</button>
            </div>
<script src="/js/alterarCorTabela.js"></script>
<script src="/js/jquery.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/js/script.js"></script>
<script src="/js/cadastros.js"></script>
</body>
</html>