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
        <div style="display: flex;align-items: center;flex-direction: row;justify-content: space-between;">
            <form style="display: contents;" action="/turma/{{$sala->id}}/chamada" method="get">    
                <select data-unidade name="unidade" class="form-control" id="Base_Combobox" style="display: block;">
                     <option selected disabled value="">Unidade</option>
                     <option value="qtd_falta_Um" {{$unidadeTela=="qtd_falta_Um"?"selected='selected'":""}}>1° Unidade</option>
                     <option value="qtd_falta_Dois" {{$unidadeTela=="qtd_falta_Dois"?"selected='selected'":""}}>2° Unidade</option>
                     <option value="qtd_falta_Tres" {{$unidadeTela=="qtd_falta_Tres"?"selected='selected'":""}}>3° Unidade</option>
                     <option value="qtd_falta_Quatro" {{$unidadeTela=="qtd_falta_Quatro"?"selected='selected'":""}}>4° Unidade</option>
                </select>
                <button class="btn" style="float: right;">Recarregar</button>
            </form>
        </div>
        <div class="table-responsive" style="text-align: center;">
        <form action="{{route('Professor.chamada')}}" method="POST" style="margin: auto;">
        @csrf
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
                            @foreach($dadosAluno as $dadosAlunos)
                                @foreach($aluno as $alunos)
                                    @if($entidades->id==$alunos->id_usuario_to_aluno && $dadosAlunos->id_aluno==$alunos->id)
                                         @if(empty($alunos->nomeUsual))
                                             <td type="text" value="{{$dadosAlunos->id}}" disabled>{{$entidades->name}}</td>
                                         @else
                                             <td type="text" value="{{$dadosAlunos->id}}" disabled>{{$alunos->nomeUsual}}</td>
                                         @endif
                                         <input type="hidden" value="{{$dadosAlunos->id}}" name="aluno">
                                         <input type="hidden" value="{{$unidadeTela}}" name="unidade">
                                         <input type="hidden" value="{{$dadosAlunos->$unidadeTela}}" name="faltaAtuais" name="aluno">
                                         <td type="text" disabled>{{$dadosAlunos->$unidadeTela}}</td>
                                         <td><input type="number" class="input-home" name="faltas" placeholder="Qtd. de faltas: " style="font-weight: bold;display: flex;justify-content: space-around;flex-direction: row;align-items: center;margin-left: 5px;"></td>
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
    </div>
</body>

</html>