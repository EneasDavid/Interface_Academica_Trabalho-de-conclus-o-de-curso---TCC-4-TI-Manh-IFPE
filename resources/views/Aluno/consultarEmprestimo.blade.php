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
    <div style="display: flex;">
        <h4 style="padding-left: 55px">Consulta emprestimos 
            @if(empty($alunos->nomeUsual))
                 {{$entidade->name}}
            @else
                 {{$alunos->nomeUsual}}     
            @endif</h4>
    </div>
    @if(empty($emprestimoLivro))
    <div class="table-responsive" style="margin-top: 15rem;justify-content: space-around!important;">
        <form class="forms-pesquisa" style="display: flex;flex-direction: column;align-items: flex-end;"action="/acervoBiblioteca-consultar-Emprestimos" method="get">
             <input type="text" name="matricula" placeholder="Matricula do aluno:" class="input-home">
             <button class="btn" style="margin-top: 1rem;">Consultar</button>
        </form>
    </div>
    @elseif(!empty($emprestimoLivro))
    <table class="table">
            <thead>
                <tr>
                    <th>Livro</th>
                    <th>Autor</th>
                    <th>Data do Emprestimo</th>
                    <th>Situação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprestimoLivro as $livros)
                <tr>
                    <td>{{$livros->titulo}}</td>
                    <td>{{$livros->autor}}</td>
                    <td>{{$livros->created_at}}</td>
                    @if ($livros->vencido)
                        <td>Vencido</td>
                    @else
                        <td>Emprestado</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(!empty($matricula) && empty($aluno))
        <p>matricula não encontrada</p>
    @endif
<script src="/js/jquery.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/js/script.js"></script>
</body>
</html>