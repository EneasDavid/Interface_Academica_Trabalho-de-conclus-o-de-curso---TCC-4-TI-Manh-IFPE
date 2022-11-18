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
            <a href="\homeAdm"><img src="/img/voltar.png" alt="clique para voltar" height="21px"></a>    
            <h4 style="padding-left: 55px" id="topo">Professores contratados</h4>
        </div>
        <div class="container">
        <form class="forms-pesquisa" action="/listarProfessores" method="get">
            <input type="text" name="search" style="border-right-width: 0px!important; border-bottom-right-radius: 0!important;border-top-right-radius: 0!important;" id="search" class="form-control" placeholder="Pesquisar professor">
            <button class="btn" style="width:auto;height:2.3rem"><img src="/img/lupaBusca.png" class="selecionar-foto" style="padding:0 !important;width: 1.6rem;" alt=""></button>
        </form>
        @if ($busca)
            <p>Procurando por {{$busca}}</p>
        @elseif(!empty($professores) && empty($busca))
            <h4>Todos os professores contratados</h4>
        @endif
        @if (empty($professores) && $busca)
            <p>Professor não encontrado</p>
        @elseif (empty($professores))
            <p>Nenhum Professor contratado</p>
        @endif
        <div style="width: auto;display: flex;align-items: center;flex-wrap: wrap;">
        @foreach ($professores as $professor)
        <div class="container marketing pt-5" style="width: auto;">   
            <div class="row featurette">
              <div style="color: #000;" class="col-md-3">
                <div class="p-2 d-flex flex-column  align-items-center border border-secondary rounded" style="width: fit-content;">
                        @if(!empty($professor->fotoProfessor))
                            <p class="img"><img src="/img/professores/{{$professor->fotoProfessor}}" class="selecionar-foto" style="padding:0 !important" alt="selecionar foto"></p>
                        @else
                            <p class="img"><img src="/img/upload-foto.png" class="selecionar-foto" style="padding:0 !important" alt="selecionar foto"></p>
                        @endif
                        @foreach($entidades as $entidade)
                            @if($entidade->id==$professor->id_usuario_to_professors)
                            <div class="pesquisa">
                            <p><b>Nome: </b>{{$entidade->name}}</p>     
                            <p><b>Matricula: </b>{{$entidade->matricula}}</p>    
                            </div>
                            @endif
                        @endforeach
                        <div class="pesquisa">
                            <a href="{{$professor->id}}" class="botao" style="height: auto">Editar Professor</a>    
                            </div>
                        </div>
        </div>
        </div>
        </div>
        @endforeach
        </div>
        <div class="voltarTopo" >
            @if ($busca)
            <a href="/listarProfessores">Todas os professores</a>
            @endif
            <a href="#topo">Voltar ao topo</a>
        </div>
        </div>
    </body>
</html>