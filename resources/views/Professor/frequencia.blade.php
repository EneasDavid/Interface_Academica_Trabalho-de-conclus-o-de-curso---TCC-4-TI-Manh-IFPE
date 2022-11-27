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
        <a href="/turma/{{$sala->id}}" style="padding-right: .8rem;"><img src="/img/voltar.png" alt="clique para voltar" height="21px"></a>
        <h4 style="padding-left: 55px">Chamada</h4>
    </div>
    <div class="container-fluid">
        <form action="" style="width: max-content;margin: auto;">
        @csrf
            <textarea name="conteudo" id="" cols="30" rows="10" style="width: 95%;display: block; background-color:#dbdbdb; font: 12px sans-serif; margin: 5px;"></textarea>
            @foreach($entidade as $entidades)
                @foreach($aluno as $alunos)
                    <div class="aluno" style="display: flex;">
                       @if(empty($alunos->nomeUsual))
                             <p type="text" class="input-home" value="$enitades->id" disabled>{{$entidades->name}}</p>
                           @else
                             <p type="text" class="input-home" value="$enitades->id" disabled>{{$alunos->nomeUsual}}</p>
                        @endif
                        <input type="number" class="input-home" placeholder="Qtd. de faltas: " style="margin-left: 5px;font-weight: bold;">
                    </div>
            @endforeach
            @endforeach
            <button class="btn" style="float: right;">Salvar</button>
        </form>
    </div>
</body>

</html>