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
                        <a class="nav-link aluno" style="width: auto;" href="/emprestimoLivro">
                            <li class="nav-item" style="height: 100%;">
                                <div class="">
                                    Emprestimos
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
                        <a class="nav-link aluno" style="width: auto;" href="/boletim">
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
            <div class="container">
                <div style="display: flex;">
                    <h4 style="padding-left: 55px">Boletim</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Matéria</th>
                                <th scope="col">CH</th>
                                <th scope="col">TURMA</th>
                                <th scope="col">T. FALTAS</th>
                                <th scope="col">M. FINAL</th>
                                <th scope="col">UNID. 1</th>
                                <th scope="col">F</th>
                                <th scope="col">UNID. 2</th>
                                <th scope="col">F</th>
                                <th scope="col">UNID. 3</th>
                                <th scope="col">F</th>
                                <th scope="col">UNID. 4</th>
                                <th scope="col">F</th>
                                <th scope="col">M.P</th>
                                <th scope="col">EXAME FINAL</th>
                                <th scope="col">M.F</th>
                                <th scope="col">SITUAÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dadosBoletim as $boletim)
                            @if($boletim->id_aluno==$aluno->id)
                                    <tr>
                                         @foreach($materia as $materiaNome)
                                             @if($materiaNome->id==$boletim->id_materia)
                                                 <th scope="row">{{$materiaNome->nomeMateria}}</th>
                                            @endif
                                         @endforeach
                                         <td>xxx</td>
                                         <td>{{$aluno->anoCurso}}° {{$aluno->curso}} {{$aluno->turno}}</td>
                                        <td>{{$boletim->qtd_falta_geral}}</td>
                                        <?php
                                            $media=($boletim->notaUm+$boletim->notaDois+$boletim->notaTres+$boletim->notaQuatro)/4;
                                            echo '<td>'.$media.'</td>';
                                        ?>
                                        <td>{{$boletim->notaUm}}</td>
                                        <td>{{$boletim->qtd_falta_Um}}</td>
                                        <td>{{$boletim->notaDois}}</td>
                                        <td>{{$boletim->qtd_falta_Dois}}</td>
                                        <td>{{$boletim->notaTres}}</td>
                                        <td>{{$boletim->qtd_falta_Tres}}</td>
                                        <td>{{$boletim->notaQuatro}}</td>
                                        <td>{{$boletim->qtd_falta_Quatro}}</td>
                                        <td>z</td>
                                        <td>p</td>
                                        <td>h</td>
                                        @if ($boletim->situacao)
                                             <td>Aprovado</td>
                                        @else
                                             <td>Reprovado</td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/script.js"></script>
</body>

</html>