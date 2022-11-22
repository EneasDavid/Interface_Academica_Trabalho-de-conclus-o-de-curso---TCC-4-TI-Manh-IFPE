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
         <div class="container">
            <div style="display:flex;align-items: center;justify-content: space-between;">
                <form class="forms-pesquisa" action="/listarLivros" method="get">
                <input type="text" name="search" style="border-right-width: 0px!important; border-bottom-right-radius: 0!important;border-top-right-radius: 0!important;" id="search" class="form-control" placeholder="Pesquisar Livro">
                <button class="btn" style="width:auto;height:2.3rem"><img src="/img/lupaBusca.png" class="selecionar-foto" style="padding:0 !important;width: 1.6rem;" alt=""></button>
                </form>
            </div>
            @if ($busca)
            <p>Procurando por {{$busca}}</p>
            @elseif(!empty($livros) && empty($busca))
            <h5>Todos os livros</h5>
            @endif
            @if (empty($livros) && $busca)
            <p>livros não encontrado</p>
            @elseif (empty($livros))
            <p>Nenhum livros cadastrado</p>
            @endif
            <table class="table">
         <thead>
             <tr>
                 <th>Título</th>
                 <th>Autor</th>
                 <th>Edição</th>
                 <th>Volume</th>
                 <th>Qtd. disponível</th>
                 <th>Pegar</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($livro as $livros)
                 <tr>
                     <td>{{$livros->titulo}}</td>
                     <td>{{$livros->autor}}</td>
                     <td>{{$livros->edicao}}</td>
                     <td>{{$livros->volume}}</td>
                     <td>{{$livros->qtd_disponivel}}</td>
                     <td> 
                        <form action="/emprestimoLivro/{{$livros->id}}" method="POST">
                            @csrf 
                            <a href="/emprestimoLivro/{{$livros->id}}" 
                                id="event-submit" 
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Emprestimo
                            </a>
                      </form>
                    </td>
                 </tr>
             @endforeach
         </tbody>
        </table>
         </div>
         <script src="/js/jquery.js"></script>
         <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
         <script src="/js/script.js"></script>
    </body>
</html>