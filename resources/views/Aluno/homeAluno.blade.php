<!doctype html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/style.css" rel="stylesheet">
    <title>Sistema Acadêmico</title>
</head>
<!--corpo-->
<body>
<!--menu-->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="navAjuste">
        <a class="navbar-text" href="/homeAluno">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="color: #000;">
            <ul class="navbar-nav aluno">
                <a class="nav-link aluno" style="width: auto;" href="alterarSenhaToAluno">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Alterar senha
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="/acervoBibliotecaToAluno">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Biblioteca
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="/calendarioAcademico">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Calendário Acadêmico
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="#">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Boletim
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="#">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Solicitar Documentos
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="#">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Matrizes curriculares
                        </div>
                    </li>
                </a>
                @if(!empty($aluno->medidasDiciplinares))
                <a class="nav-link aluno" style="width: auto;" href="#">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Medidas disciplinares
                        </div>
                    </li>
                </a>
                @endif
                @if(!empty($aluno->premicoes))
                <a class="nav-link aluno" style="width: auto;" href="#">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Premiações
                        </div>
                    </li>
                </a>
                @endif
                @if(!empty($aluno->renovarMatricula))
                <a class="nav-link aluno" style="width: auto;" href="#">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Renovar Matricula
                        </div>
                    </li>
                </a>
                @endif
                <a class="nav-link aluno" style="width:auto;" href="/logout">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                             Sair
                        </div>
                    </li>
                </a>
            </ul>
    </div>
    </div>
</nav>
<main style="height: 85% !important;display: flex;flex-wrap: wrap;align-items: center;justify-content: space-around;" class="row">
    <div class="col-sm-6" style="width: max-content;">
         <p class="titulo">Dados cadastrados</p>
         <div>
             @if(!empty($aluno->fotoAluno))
                 <p class="img" style="display: flex;justify-content: space-around;"><img src="img/alunos/{{$aluno->fotoAluno}}" class="selecionar-foto" style="padding:0 !important" alt="selecionar foto"></p>
             @else
                 <p class="img" style="display: flex;justify-content: space-around;"><img src="img/upload-foto.png" class="selecionar-foto" alt="selecionar foto"></p>
             @endif
                 <div class="entrada">
                     <label for="nome-aluno">Nome do aluno:</label>
                     @if(empty($aluno->nomeUsual))
                         <p><b>Nome: </b>{{$entidade->name}}</p>     
                         <p type="text" class="input-home" disabled>{{$entidade->name}}</p>
                     @else
                         <p type="text" class="input-home" disabled>{{$aluno->nomeUsual}}</p>
                     @endif
                     <label for="matricula">Matrícula:</label>
                     <p type="text" class="input-home" disabled>  {{$entidade->matricula}}</p>
                     <button class="btn" style="margin-top: 10px">Editar</button>
                 </div>
             </div>
            </div>
            <div class="col-sm-8" style="">
            <p class="titulo">Horário do {{$sala->serie}}° {{$sala->curso}} {{$sala->turno}}</p>
            <div class="">
                <div class="table-responsive" style="text-align: center;">
                <table class="dia" style="width: 100%; margin: 5px; text-align: center;">
                    <thead>
                        <tr>
                         <th scope="col" class="dia">Hora</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 5px;">
                    @if($sala->turno=='Manhã')
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
                                    <a href="diarioAula/{{$aulaUmSegunda->id}}">
                                        <p1 class="materia">{{$aulaUmSegunda->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorUmSegunda->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                 <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($professorDoisSegunda))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaDoisSegunda->id}}">
                                        <p1 class="materia">{{$aulaDoisSegunda->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorDoisSegunda->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresSegunda))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaTresSegunda->id}}">
                                        <p1 class="materia">{{$aulaTresSegunda->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorTresSegunda->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroSegunda))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaQuatroSegunda->id}}">
                                        <p1 class="materia">{{$aulaQuatroSegunda->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorQuatroSegunda->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr> 
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoSegunda))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaCincoSegunda->id}}">
                                        <p1 class="materia">{{$aulaCincoSegunda->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorCincoSegunda->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisSegunda))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaSeisSegunda->id}}">
                                        <p1 class="materia">{{$aulaSeisSegunda->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorSeisSegunda->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
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
                                    <a href="diarioAula/{{$aulaUmTerca->id}}">
                                        <p1 class="materia">{{$aulaUmTerca->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorUmTerca->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                 <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaDoisTerca))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaDoisTerca->id}}">
                                        <p1 class="materia">{{$aulaDoisTerca->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorDoisTerca->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresTerca))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaTresTerca->id}}">
                                        <p1 class="materia">{{$aulaTresTerca->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorTresTerca->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroTerca))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaQuatroTerca->id}}">
                                        <p1 class="materia">{{$aulaQuatroTerca->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorQuatroTerca->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr> 
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoTerca))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaCincoTerca->id}}">
                                        <p1 class="materia">{{$aulaCincoTerca->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorCincoTerca->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisTerca))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaSeisTerca->id}}">
                                        <p1 class="materia">{{$aulaSeisTerca->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorSeisTerca->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
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
                                    <a href="diarioAula/{{$aulaUmQuarta->id}}">
                                        <p1 class="materia">{{$aulaUmQuarta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorUmQuarta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                 <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($professorDoisQuarta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaDoisQuarta->id}}">
                                        <p1 class="materia">{{$aulaDoisQuarta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorDoisQuarta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresQuarta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaTresQuarta->id}}">
                                        <p1 class="materia">{{$aulaTresQuarta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorTresQuarta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroQuarta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaQuatroQuarta->id}}">
                                        <p1 class="materia">{{$aulaQuatroQuarta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorQuatroQuarta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr> 
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoQuarta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaCincoQuarta->id}}">
                                        <p1 class="materia">{{$aulaCincoQuarta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorCincoQuarta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisQuarta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaSeisQuarta->id}}">
                                        <p1 class="materia">{{$aulaSeisQuarta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorSeisQuarta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
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
                                    <a href="diarioAula/{{$aulaUmQuinta->id}}">
                                        <p1 class="materia">{{$aulaUmQuinta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorUmQuinta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                 <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($professorDoisQuinta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaDoisQuinta->id}}">
                                        <p1 class="materia">{{$aulaDoisQuinta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorDoisQuinta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresQuinta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaTresQuinta->id}}">
                                        <p1 class="materia">{{$aulaTresQuinta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorTresQuinta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroQuinta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaQuatroQuinta->id}}">
                                        <p1 class="materia">{{$aulaQuatroQuinta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorQuatroQuinta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr> 
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoQuinta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaCincoQuinta->id}}">
                                        <p1 class="materia">{{$aulaCincoQuinta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorCincoQuinta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisQuinta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaSeisQuinta->id}}">
                                        <p1 class="materia">{{$aulaSeisQuinta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorSeisQuinta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
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
                                    <a href="diarioAula/{{$aulaUmSexta->id}}">
                                        <p1 class="materia">{{$aulaUmSexta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorUmSexta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                 <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($professorDoisSexta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaDoisSexta->id}}">
                                        <p1 class="materia">{{$aulaDoisSexta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorDoisSexta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaTresSexta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaTresSexta->id}}">
                                        <p1 class="materia">{{$aulaTresSexta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorTresSexta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaQuatroSexta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaQuatroSexta->id}}">
                                        <p1 class="materia">{{$aulaQuatroSexta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorQuatroSexta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr> 
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                            
                            @if(!empty($aulaCincoSexta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaCincoSexta->id}}">
                                        <p1 class="materia">{{$aulaCincoSexta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorCincoSexta->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif                       
                            @if(!empty($aulaSeisSexta))
                            <tr>
                                <td>
                                    <a href="diarioAula/{{$aulaUmSexta->id}}">
                                        <p1 class="materia">{{$aulaSeisSexta->nomeMateria}}</p1>
                                        <p1 class="pofessor">{{$professorSeisSext->name}}</p1>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    <a href="#">
                                        <p1 class="materia" style="color: #c8c8c800;">Materia</p1>
                                        <p1 class="pofessor" style="color: #c8c8c800;">Professor</p1>
                                    </a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
<script src="/js/alterarCorTabela.js"></script>
<script src="/js/jquery.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/js/script.js"></script>
</main>
</body>

</html>