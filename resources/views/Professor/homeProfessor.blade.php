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
        @foreach ($salaAula as $sala)
        @if($sala->segundaUm==$turma->id or $sala->segundaDois==$turma->id or $sala->segundaTres==$turma->id or $sala->segundaQuatro==$turma->id or $sala->segundaCinco==$turma->id or $sala->segundaSeis==$turma->id
        or $sala->tercaUm==$turma->id or $sala->tercaDois==$turma->id or $sala->tercaTres==$turma->id or $sala->tercaQuatro==$turma->id or $sala->tercaCinco==$turma->id or $sala->tercaSeis==$turma->id
        or $sala->quartaUm==$turma->id or $sala->quartaDois==$turma->id or $sala->quartaTres==$turma->id or $sala->quartaQuatro==$turma->id or $sala->quartaCinco==$turma->id or $sala->quartaSeis==$turma->id
        or $sala->quintaUm==$turma->id or $sala->quintaDois==$turma->id or $sala->quintaTres==$turma->id or $sala->quintaQuatro==$turma->id or $sala->quintaCinco==$turma->id or $sala->quintaSeis==$turma->id
        or $sala->sextaUm==$turma->id or $sala->sextaDois==$turma->id or $sala->sextaTres==$turma->id or $sala->sextaQuatro==$turma->id or $sala->sextaCinco==$turma->id or $sala->sextaSeis==$turma->id)     
                <a class="row" href="/turma/{{$sala->id}}" style="margin-bottom: 1rem;">
                     <div class="acaoAdministrativo">
                         <div class="middle">
                             <h1>{{$turma->nomeMateria}}</h1>
                                    <p>{{$sala->serie}}° {{$sala->curso}} {{$sala->turno}}</p>
                            </div>
                        </div>
                    </a>
        @endif
        @endforeach
        @endforeach
         </div>
     </div>
</body>
</html>