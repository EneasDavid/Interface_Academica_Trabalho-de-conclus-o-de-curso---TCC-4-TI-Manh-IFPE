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
        <h4 style="padding-left: 55px">Criar matéria</h4>
    </div>
    @if (count($professores)>0)
    <div class="container" style="display: flex;justify-content: space-around;">
        <div class="row" style="margin-top: 13rem;">
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
        <form class="container" action="{{route('ADM.cadastrarMateria')}}" method="POST">
               @csrf
                <input type="text" name="nomeMateria" class="input-home" placeholder="Nome da matéria: ">
                <select name="id_professor" id="Base_Combobox">
                    <option disabled selected value="">Professor</option>
                    <?php
                            foreach($professores as $professor){
                                foreach($entidade as $entidades){
                                    if($professor->id_usuario_to_professors==$entidades->id)
                                    {
                                        echo '<option name="id_professor" value="'.$professor->id.'">'.$entidades->name.'</option>';
                                    }
                            }
                        }
                        ?>
                </select>
                <button class="btn" type="submit" style="display: block; margin-top: 15px;text-align: center;">Salvar matéria</button>
            </form>
        </div>
        @else
        <p style="margin: auto;width: max-content;">Não há professor cadastrado. <a href="\criarProfessor"><strong>click aqui para cadastrar um</strong></a></p>
        @endif
    </div>
</body>

</html>