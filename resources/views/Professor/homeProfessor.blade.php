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
    <div style="display: flex;justify-content: space-between;">
        <h4 style="padding-left: 55px">Home</h4>
        <a href="logout" style="padding-right: .8rem;"><img src="img/sair.png" alt="clique para voltar" height="21px"></a>
    </div>
    <div class="container">
        <div style="height: 90%;display: flex; flex-wrap: wrap; justify-content: space-around;">
        @foreach ($materia as $turma)     
            <a class="row" href="/turma/{{$turma->id}}" style="margin-bottom: 1rem;">
                     <div class="acaoAdministrativo">
                         <div class="middle">
                             <h1>{{$turma->nomeMateria}}</h1>
                             @foreach ($salaAula as $sala)
                             @dd($sala->toArray())
                                @if($sala->segundaUm==$turma->id or $sala->segundaDois==$turma->id or $sala->segundaTres==$turma->id or $sala->segundaQuatro==$turma->id or $sala->segundaCinco==$turma->id or $sala->segundaSeis==$turma->id)     
                                    <p>{{$sala->serie}}° {{$sala->curso}} {{$sala->turno}}</p>
                                @endif
                             @endforeach
                        </div>
                    </div>
                </a>
        @endforeach
         </div>
     </div>
</body>
</html>