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
        <h4 style="padding-left: 55px">Biblioteca</h4>
    </div>
    <div class="container">
    <div style="display:flex;justify-content: space-between;">
         <form class="forms-pesquisa" action="/acervoBiblioteca" method="get">
            <input type="text" name="search" style="border-right-width: 0px!important; border-bottom-right-radius: 0!important;border-top-right-radius: 0!important;" id="search" class="form-control" placeholder="Pesquisar Livros">
            <button class="btn" style="width:auto;height:2.3rem"><img src="/img/lupaBusca.png" class="selecionar-foto" style="padding:0 !important;width: 1.6rem;" alt=""></button>
         </form>
        <button type="button" class="btn" data-target="#modalExemplo" data-salvar onclick="chamaPopUp()">Adicionar livro</button>
    </div>
      <div class="modal pagina input" id="modalExemplo" tabindex="-1" role="dialog" style="margin: 0!important;" aria-labelledby="exampleModalLabel" aria-hidden="true" popUp-cadastrar-tag>
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Adicionar livro</h5>
        </div>
        <div class="modal-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <form class="container" action="{{route('ADM.cadastrarLivro')}}" method="POST">
        @csrf 
          <input type="text" placeholder="Título" name="titulo" id="titulo" class="input-home" >
          <input type="text" placeholder="Autor" name="autor" id="autor" class="input-home">
          <input type="text" placeholder="Volume" name="volume" id="volume" class="input-home">
          <input type="text" placeholder="Edição" name="edicao" id="edicao" class="input-home">
          <input type="number" placeholder="Qtd. disponível" name="qtd_disponivel" id="qtd_livros" class="input-home">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="removerPopUp()">Cancelar</button>
        <button class="btn" type="submit">Salvar</button>
        </div>
      </div>
    </div>
  </div>
      @if ($busca)
      <p>Procurando por {{$busca}}</p>
      @elseif(!empty($livros) && empty($busca))
      <h5>Todos os livros cadastrados</h5>
      @endif
      @if (empty($livros) && $busca)
      <p>Livro não encontrado</p>
      @elseif(empty($livros))
      <p>Nenhum livro cadastrado </p>
      @else
      <div class="col-sm-12" style="">
         <div class="table-responsive" style="text-align: center;">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Título</th>
                          <th>Autor</th>
                          <th>Edição</th>
                          <th>Volume</th>
                          <th>Qtd. disponível</th>
                          <th>*</th>

                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($livros as $livros)
                      <tr>
                          <td>{{$livros->titulo}}</td>
                          <td>{{$livros->autor}}</td>
                          <td>{{$livros->edicao}}</td>
                          <td>{{$livros->volume}}</td>
                          <td>{{$livros->qtd_disponivel}}</td>
                          <td>
                            {{--Corrigir metodo delete
                            <form action="/destruirLivro/{{$livros->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                              </form>--}}
                      </tr>
                    @endforeach
                  </tbody>
              </table>
      </div>
    </div>
  @endif
  </div>
    <script src="/js/cadastros.js"></script>
    <script src="/js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/js/script.js"></script>
</body>
</html>