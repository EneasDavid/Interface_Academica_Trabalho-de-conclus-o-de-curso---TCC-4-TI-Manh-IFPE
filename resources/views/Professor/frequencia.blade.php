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
        <form action="{{route('Professor.chamada')}}" method="POST" style="width: max-content;margin: auto;">
        @csrf
        <select data-unidade name="unidade" class="form-control" id="Base_Combobox" style="display: block;">
             <option disabled selected value="">Unidade</option>
             <option value="qtd_falta_Um">1° Unidade</option>
             <option value="qtd_falta_Dois">2° Unidade</option>
             <option value="qtd_falta_Tres">3° Unidade</option>
             <option value="qtd_falta_Quatro">4° Unidade</option>
        </select>
            <textarea name="conteudo" id="" cols="30" rows="10" style="width: 95%;display: block; background-color:#dbdbdb; font: 12px sans-serif; margin: 5px;"></textarea>
            <table class="table">
            <thead>
              <tr>
                  <th>Aluno</th>
                  <th>Falta unidade</th>
                  <th>Falta atual</th>
              </tr>
          </thead>
          <tbody>
              @foreach($entidade as $entidades)
              <tr>
                     @foreach($aluno as $alunos)
                       @if($entidades->id==$alunos->id_usuario_to_aluno)
                             @if(empty($alunos->nomeUsual))
                                 <td type="text" value="{{$entidades->id}}" disabled>{{$entidades->name}}</td>
                             @else
                                 <td type="text" value="{{$entidades->id}}" disabled>{{$alunos->nomeUsual}}</td>
                             @endif
                             @foreach($dadosAluno as $dadosAlunos)
                                 @if($dadosAlunos->id_aluno==$alunos->id)
                                    <script type="text/Javascript">
                                         let unidade=document.querySelector('[data-unidade]').value;
                                     </script>
                                     <td type="text" value="{{$dadosAlunos->qtd_falta_Um}}" disabled>{{$dadosAlunos->qtd_falta_Um}}</td>
                                     <td><input type="number" class="input-home" placeholder="Qtd. de faltas: " style="font-weight: bold;display: flex;justify-content: space-around;flex-direction: row;align-items: center;margin-left: 5px;"></td>
                                 @endif
                            @endforeach
                       @endif
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