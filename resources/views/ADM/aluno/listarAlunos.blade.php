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
            <h4 style="padding-left: 55px;" id="topo">Alunos Matriculados</h4>
        </div>
        <div class="container">
        <form class="forms-pesquisa" action="/listarAlunos" method="get">
            <input type="text" name="search" style="border-right-width: 0px!important; border-bottom-right-radius: 0!important;border-top-right-radius: 0!important;" id="search" class="form-control" placeholder="Pesquisar Aluno">
            <button class="btn" style="width:auto;height:2.3rem"><img src="/img/lupaBusca.png" class="selecionar-foto" style="padding:0 !important;width: 1.6rem;" alt=""></button>
        </form>
        @if ($busca)
             <p>Procurando por {{$busca}}</p>
        @elseif(count($alunos)>0 && empty($busca))
             <h5>Todos os alunos matriculados</h5>
        @endif
        @if (count($alunos)==0 && $busca)
             <p>Aluno não encontrado</p>
        @elseif (count($alunos)==0)
             <p>Nenhum aluno matriculado <strong><a href="/criarAluno">click aqui para matricular um</a></strong></p>
        @else
             <div style="display: flex;align-items: center;flex-wrap: wrap;">
        @foreach ($alunos as $aluno)
        <div class="container marketing pt-5" style="width: auto;">   
            <div class="row featurette">
              <div style="color: #000;" class="col-md-3">
                <div class="p-2 d-flex flex-column  align-items-center  border border-secondary rounded" style="width: fit-content;">
                        @if(!empty($aluno->fotoAluno))
                            <p class="img"><img src="/img/alunos/{{$aluno->fotoAluno}}" class="selecionar-foto" style="padding:0 !important" alt="selecionar foto"></p>
                        @else
                            <p class="img"><img src="/img/upload-foto.png" class="selecionar-foto" style="padding:0 !important" alt="selecionar foto"></p>
                        @endif
                        @foreach($entidades as $entidade)
                            @if($entidade->id==$aluno->id_usuario_to_aluno)
                                <div class="pesquisa">
                            @if(empty($aluno->nomeUsual))
                                <p><strong>Nome: </strong>{{$entidade->name}}</p>     
                            @else
                                <p><strong>Nome: </strong>{{$aluno->nomeUsual}}</p>     
                            @endif
                            <p><strong>Matricula: </strong>{{$entidade->matricula}}</p>    
                            </div>
                            @endif
                        @endforeach
                        <div class="pesquisa">
                            <p><strong>Turma: </strong>{{$aluno->anoCurso}} {{$aluno->curso}} {{$aluno->turno}}</p>
                        </div>
                        <div style="display: flex;align-items: center;justify-content: space-between;flex-direction: row;">
                            <a href="editarAluno/{{$aluno->id}}" class="btn" style="height: auto">Editar Aluno</a>    
                            <form action="/destruirAluno/{{$aluno->id}}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                             </form>    
                        </div>
                        </div>
                </div>
               </div>
           </div>
        @endforeach
    </div>
    @endif

        @if ($busca)
            <a href="/listarAlunos">Ver todos os alunos</a>
        @elseif(count($alunos)>0)
            <a href="#topo">Voltar ao topo</a>
        @endif
        </div>
    </body>
</html>