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
        <a href="/homeAdm"><img src="/img/voltar.png" alt="clique para voltar" height="21px"></a>
        <h4 style="padding-left: 55px">Consulta emprestimos de 
            @if(!empty($alunos))
                @if(empty($alunos->nomeUsual))
                    {{$entidade->name}}
                @else
                    {{$alunos->nomeUsual}}     
                @endif
            @else
            um aluno
            @endif
        </h4>
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
                    <th>autor</th>
                    <th>matricula</th>
                    <th>Data do Emprestimo</th>
                    <th>Situação</th>
                    <th>Finalizar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprestimoLivro as $livros)
                <tr>
                    <td>{{$livros->titulo}}</td>
                    <td>{{$livros->autor}}</td>
                    <td>{{$entidade->matricula}}</td>
                    <td>{{$livros->created_at}}</td>
                    @if ($livros->vencido)
                        <td>Vencido</td>
                    @else
                        <td>Emprestado</td>
                    @endif
                    <td>
                        <form action="/destruirEmprestimo/{{$livros->pivot}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger delete-btn">Devolvido</button>
                        </form> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(!empty($matricula) && empty($aluno))
        <p>matricula não encontrada</p>
    @endif
</body>
</html>