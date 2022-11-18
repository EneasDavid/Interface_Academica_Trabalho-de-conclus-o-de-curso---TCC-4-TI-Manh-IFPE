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
        <h4 style="padding-left: 55px">Consulta emprestimos</h4>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID emprestimo</th>
                    <th>Livro</th>
                    <th>consignatário</th>
                    <th>matricula</th>
                    <th>Data do Emprestimo</th>
                    <th>Situação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprestimoLivro as $livros)
                <tr>
                    <td>{{$livros->id}}</td>
                    <td>{{$livroEmprestimos->titulo}}</td>
                    <td>{{$alunoEmprestimos->name}}</td>
                    <td>{{$alunoEmprestimos->matricula}}</td>
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
    </div>
    
</body>
</html>