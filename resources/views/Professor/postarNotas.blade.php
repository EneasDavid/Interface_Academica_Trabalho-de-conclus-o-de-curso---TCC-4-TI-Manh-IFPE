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
        <h4 style="padding-left: 55px">Inserir nota</h4>
    </div>
    <div class="container-fluid">
    @if ($errors->any())
                            <div>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div></div>
                            @endif
                            @if (session('danger'))
                            <div class="alert alert-danger">
                                {{ session('danger') }}
                            </div>
                            @endif
        <form action="{{route('Professor.nota')}}" method="POST" style="width: max-content;margin: auto;">
        @csrf
        <select name="unidade" class="form-control" id="Base_Combobox" style="display: block;">
                    <option disabled selected value="">Unidade</option>
                    <option value="notaUm">1° Unidade</option>
                    <option value="notaDois">2° Unidade</option>
                    <option value="notaTres">3° Unidade</option>
                    <option value="notaQuatro">4° Unidade</option>
                </select>
            <table class="table">
            <thead>
              <tr>
                  <th>Aluno</th>
                  <th>Nota</th>
              </tr>
          </thead>
          <tbody>
                     @foreach($entidade as $entidades)
                         <tr>
                            @foreach($dadosAluno as $dadosAlunos)
                                @foreach($aluno as $alunos)
                                    @if($entidades->id==$alunos->id_usuario_to_aluno && $dadosAlunos->id_aluno==$alunos->id)
                                         @if(empty($alunos->nomeUsual))
                                             <td type="text" value="{{$dadosAlunos->id}}" disabled>{{$entidades->name}}</td>
                                         @else
                                             <td type="text" value="{{$dadosAlunos->id}}" disabled>{{$alunos->nomeUsual}}</td>
                                         @endif
                                         <input type="hidden" value="{{$dadosAlunos->id}}" name="aluno">
                                         <td><input type="number" name="nota" class="input-home" style="width: 20%;font-weight: bold;display: flex;justify-content: space-around;flex-direction: row;align-items: center;margin-left: 5px;"></td>
                                    @endif
                                @endforeach
                            @endforeach
                         </tr>
                     @endforeach
                    </tbody>
    </table>
        <button class="btn" style="float: right;">Salvar</button>
    </form>
    </div>
</body>

</html>