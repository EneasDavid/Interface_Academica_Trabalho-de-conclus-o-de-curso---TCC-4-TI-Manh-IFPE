<!doctype html>
<html lang="pt-br">
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
        <a href="/homeProfessor" style="padding-right: .8rem;"><img src="/img/voltar.png" alt="clique para voltar" height="21px"></a>
        <h4 style="padding-left: 55px">{{$sala->serie}}° {{$sala->curso}} {{$sala->turno}}</h4>
    </div>
    <div class="container">
        <div style="height: 90%;display: flex; flex-wrap: wrap; justify-content: space-around;">
             <a class="row" href="/turma/{{$sala->id}}/chamada" style="margin-bottom: 1rem;">
                 <div class="acaoAdministrativo">
                     <div class="middle">
                         <h1>Frequência</h1>
                     </div>
                 </div>
             </a>
             <a class="row" href="/turma/{{$sala->id}}/notas" style="margin-bottom: 1rem;">
                 <div class="acaoAdministrativo">
                     <div class="middle">
                         <h1>Inserir nota</h1>
                     </div>
                 </div>
             </a>
         </div>
     </div>
</body>
</html>