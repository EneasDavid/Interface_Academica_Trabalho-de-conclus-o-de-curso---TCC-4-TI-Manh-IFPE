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
        <a href="/homeAdm"><img src="img/voltar.png" alt="clique para voltar" height="21px"></a>
        <h4 style="padding-left: 55px" id="topo">Listar turmas</h4>
    </div>
    <div class="container">
        <form class="forms-pesquisa" action="/editarTurma" method="get">
            <input type="text" name="search" style="border-right-width: 0px;:0 !important; border-bottom-right-radius: 0!important;border-top-right-radius: 0!important;" id="search" class="form-control" placeholder="Pesquisar turma">
            <button class="btn" style="width:auto;height:2.3rem"><img src="/img/lupaBusca.png" class="selecionar-foto" style="padding:0 !important;width: 1.6rem;" alt=""></button>
        </form>
        @if ($busca)
            <p>Procurando por {{$busca}}</p>
        @elseif(!empty($salaDeAula) && empty($busca))
            <h5 >Todos as turmas</h5>
        @endif
        @if (!empty($salaDeAula) && $busca)
            <p>Turma não encontrado</p>
        @elseif (empty($salaDeAula))
            <p>Nenhum turma criada</p>
        @endif
        <div style="display: flex;flex-wrap: wrap;">
        @foreach ($salaDeAula as $sala)
        <div class="container" style="display: flex; width: max-content;">
            <a href="/dadosTurma/{{$sala->id}}">
                <div class="row" style="width:15rem">        
                        <div class="turma2">
                            <div class="middle">
                                 <h1>{{$sala->serie}}° {{$sala->curso}}</h1>
                                 <p>{{$sala->turno}}</p>
                            </div>
                            </div>
                
                        </div>
                    </a>
            </div>
        @endforeach 
        </div>
        <div class="voltarTopo" >
            @if ($busca)
            <a href="/editarTurma">Todas as turmas</a>
            @endif
            <a href="#topo">Voltar ao topo</a>
        </div>
    </div>
</body>
</html>