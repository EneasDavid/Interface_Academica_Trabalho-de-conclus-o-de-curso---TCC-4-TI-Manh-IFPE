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
        <h4 style="padding-left: 55px">Editar Professor</h4>
    </div>
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
        <form class="container" action="/Forms-Professor-Editar/{{$entidade->id}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="row">
            <div class="col-sm-3 py-2">
                @if(!empty($professor->fotoProfessor))
                     <p class="img"><img src="/img/professores/{{$professor->fotoProfessor}}" class="selecionar-foto" style="padding:0 !important" alt="{{$professor->fotoProfessor}}" ></p>
                @else
                     <p class="img"><img src="/img/upload-foto.png" class="selecionar-foto" style="padding:0 !important" alt="{{$professor->fotoProfessor}}" ></p>
                @endif
                <input type="file" name="fotoProfessor" style="height: 2.5rem; background-color: transparent;" id="fotoProfessor" placeholder="Foto:" class="form-control input-home">
                <p>Dados pessoais</p>
                <input type="text" name="name" placeholder="Nome:" class="input-home" value="{{$entidade->name}}">
                <select name="sexo" class="form-control" id="Base_Combobox" value="{{$professor->sexo}}">
                    <option selected value="">Sexo:</option>
                    <option value="m" {{$professor->sexo=="m"?"selected='selected'":""}}>Masculino</option>
                    <option value="f" {{$professor->sexo=="f"?"selected='selected'":""}}>Feminino</option>
                </select>
                <select class="form-control" name="estadoCivil" id="Base_Combobox" style="display: block;">
                    <option selected value="">Estado civíl</option>
                    <option value="solteiro" {{$professor->estadoCivil=="solteiro"?"selected='selected'":""}}>Solteiro(a)</option>
                    <option value="casado" {{$professor->estadoCivil=="casado"?"selected='selected'":""}}>Casado(a)</option>
                    <option value="divorciado" {{$professor->estadoCivil=="divorciado"?"selected='selected'":""}}>Divorciado(a)</option>
                    <option value="viuvo" {{$professor->estadoCivil=="viuvo"?"selected='selected'":""}}>Viúvo</option>
                </select>
                <input type="text" name="nomeMae" value="{{$professor->nomeMae}}" placeholder="Nome da mãe:" class="input-home">
                <select type="text" name="TipoSanguineo"  class="form-control" id="Base_Combobox" style="display: block;">
                     <option selected value="">Tipo Sanguineo</option>
                     <option value="AB+" {{$professor->TipoSanguineo=="AB+"?"selected='selected'":""}}>AB+</option>
                     <option value="AB-" {{$professor->TipoSanguineo=="AB-"?"selected='selected'":""}}>AB-</option>
                     <option value="A+" {{$professor->TipoSanguineo=="A+"?"selected='selected'":""}}>A+</option>
                     <option value="A-" {{$professor->TipoSanguineo=="A-"?"selected='selected'":""}}>A-</option>
                     <option value="B+" {{$professor->TipoSanguineo=="B+"?"selected='selected'":""}}>B+</option>
                     <option value="B-" {{$professor->TipoSanguineo=="B-"?"selected='selected'":""}}>B-</option>
                     <option value="O+" {{$professor->TipoSanguineo=="O+"?"selected='selected'":""}}>O+</option>
                     <option value="O-" {{$professor->TipoSanguineo=="O-"?"selected='selected'":""}}>O-</option>
                </select>
                <label for="" style="font-size: 12px; padding: 5px;">Data de nascimento:</label>
                <input type="date"  name="dataNascimento" value="{{$professor->dataNascimento}}" placeholder="Data de nascimento" class="input-home">
                <input type="text" name="naturalidade" value="{{$professor->naturalidade}}" placeholder="Naturalidade" class="input-home">
                <input type="text" name="nomeUsual" value="{{$professor->nomeUsual}}" placeholder="Nome usual:" class="input-home">
                <select name="etnia" class="form-control" id="Base_Combobox" style="display: block;">
                    <option selected value="">Etnia</option>
                    <option value="branco" {{$professor->etnia=="branco"?"selected='selected'":""}}>Branco</option>
                    <option value="negro" {{$professor->etnia=="negro"?"selected='selected'":""}}>Negro</option>
                    <option value="pardo" {{$professor->etnia=="pardo"?"selected='selected'":""}}>Pardo</option>
                    <option value="amarelo" {{$professor->etnia=="amarelo"?"selected='selected'":""}}>Amarelo</option>
                </select>
            </div>       
            <div class="col-sm-3">
                <p>Documentação</p>
                <input type="text" name="rg" value="{{$professor->rg}}" placeholder="RG" class="input-home">
                <label for="" style="font-size: 12px; padding-left:5px ;">Data de expedição do RG:</label>
                <input type="date"name="rgExpedicao"  value="{{$professor->rgExpedicao}}" placeholder="" class="input-home">
                <select type="text" name="ufExpeditor" class="form-control" id="Base_Combobox" style="display: block;">
                    <option selected value="">Estado Expeditor</option>
                    <option value="AC" {{$professor->ufExpeditor=="AC"?"selected='selected'":""}}>Acre</option>
                    <option value="AL" {{$professor->ufExpeditor=="AL"?"selected='selected'":""}}>Alagoas</option>
                    <option value="AP" {{$professor->ufExpeditor=="AP"?"selected='selected'":""}}>Amapá</option>
                    <option value="AM" {{$professor->ufExpeditor=="AM"?"selected='selected'":""}}>Amazonas</option>
                    <option value="BA" {{$professor->ufExpeditor=="BA"?"selected='selected'":""}}>Bahia</option>
                    <option value="CE" {{$professor->ufExpeditor=="CE"?"selected='selected'":""}}>Ceará</option>
                    <option value="DF" {{$professor->ufExpeditor=="DF"?"selected='selected'":""}}>Distrito Federal</option>
                    <option value="ES" {{$professor->ufExpeditor=="ES"?"selected='selected'":""}}>Espírito Santo</option>
                    <option value="GO" {{$professor->ufExpeditor=="GO"?"selected='selected'":""}}>Goiás</option>
                    <option value="MA" {{$professor->ufExpeditor=="MA"?"selected='selected'":""}}>Maranhão</option>
                    <option value="MT" {{$professor->ufExpeditor=="MT"?"selected='selected'":""}}>Mato Grosso</option>
                    <option value="MS" {{$professor->ufExpeditor=="MS"?"selected='selected'":""}}>Mato Grosso do Sul</option>
                    <option value="MG" {{$professor->ufExpeditor=="MG"?"selected='selected'":""}}>Minas Gerais</option>
                    <option value="PA" {{$professor->ufExpeditor=="PA"?"selected='selected'":""}}>Pará</option>
                    <option value="PB" {{$professor->ufExpeditor=="PB"?"selected='selected'":""}}>Paraíba</option>
                    <option value="PR" {{$professor->ufExpeditor=="PR"?"selected='selected'":""}}>Paraná</option>
                    <option value="PE" {{$professor->ufExpeditor=="PE"?"selected='selected'":""}}>Pernambuco</option>
                    <option value="PI" {{$professor->ufExpeditor=="PI"?"selected='selected'":""}}>Piauí</option>
                    <option value="RJ" {{$professor->ufExpeditor=="RJ"?"selected='selected'":""}}>Rio de Janeiro</option>
                    <option value="RN" {{$professor->ufExpeditor=="RN"?"selected='selected'":""}}>Rio Grande do Norte</option>
                    <option value="RS" {{$professor->ufExpeditor=="RS"?"selected='selected'":""}}>Rio Grande do Sul</option>
                    <option value="RO" {{$professor->ufExpeditor=="RO"?"selected='selected'":""}}>Rondônia</option>
                    <option value="RR" {{$professor->ufExpeditor=="RR"?"selected='selected'":""}}>Roraima</option>
                    <option value="SC" {{$professor->ufExpeditor=="SC"?"selected='selected'":""}}>Santa Catarina</option>
                    <option value="SP" {{$professor->ufExpeditor=="SP"?"selected='selected'":""}}>São Paulo</option>
                    <option value="SE" {{$professor->ufExpeditor=="SE"?"selected='selected'":""}}>Sergipe</option>
                    <option value="TO" {{$professor->ufExpeditor=="TO"?"selected='selected'":""}}>Tocantins</option>
                    <option value="EX" {{$professor->ufExpeditor=="EX"?"selected='selected'":""}}>Estrangeiro</option>
                </select>
                <input type="text" name="expeditorRg" value="{{$professor->expeditorRg}}" class="input-home" placeholder="Orgão expedidor:">
                <input type="text" name="cpf" value="{{$professor->cpf}} "placeholder="CPF" class="input-home">
                <div id="contato">
                    <p>Contato</p>
                    <input type="text" name="numeroCelular" value="{{$professor->numeroCelular}}" class="input-home" placeholder="Celular: (ex.81996376933)">
                    <input type="email" name="email" value="{{$entidade->email}}" placeholder="E-mail:" class="input-home">
                    <input type="text" name="matricula" value="{{$entidade->matricula}}" placeholder="Matricula:" class="input-home">
                   </div>
            </div>
            <div class="col-sm-3">
                <p>Endereço</p>
                <input id="cep" type="number" class="input-home" placeholder="CEP:" value="{{$professor->cep}}" name="cep" maxlength="8" minlength="8" required data-cep>
                <input type="text" class="input-home" placeholder="Estado:" style="background: #c1c8cf;" value="{{$professor->UF}}" name="UF" id="uf" readonly >
                <input type="text" class="input-home" placeholder="Cidade:" style="background: #c1c8cf;" value="{{$professor->cidade}}" name="cidade" id="cidade" readonly >
                <input type="text" class="input-home" placeholder="Bairro:" style="background: #c1c8cf;" value="{{$professor->bairro}}" name="bairro" id="bairro" readonly >
                <input type="text" class="input-home" placeholder="Rua:" style="background: #c1c8cf;" value="{{$professor->rua}}" name="rua" id="rua" readonly required>
                <input type="number" class="input-home" placeholder="Número:" name="numeroCasa" value="{{$professor->numeroCasa}}" id="">
                <input type="text" class="input-home" placeholder="Complemento:" name="complementoCasa" value="{{$professor->complementoCasa}}" id="">
            </div>
            <div class="col-sm-3">
                <p>Dados acadêmicos</p>
                <select name="modalidade" id="Base_Combobox" style="display: block;">
                    <option selected>Modalidade de contratação</option>
                    <option value="efetivo" {{$professor->modalidade=="efetivo"?"selected='selected'":""}}>Efetivo</option>
                    <option value="substituto" {{$professor->modalidade=="substituto"?"selected='selected'":""}}Substituto>substituto</option>
                    <option value="terceirizado" {{$professor->modalidade=="terceirizado"?"selected='selected'":""}}>Terceirizado</option>
                </select>
                <select name="categoria" id="Base_Combobox" style="display: block;" disabled >
                    <option>Professor</option>
                </select>
                <select name="grauInstrucao" id="Base_Combobox" style="display: block;">
                    <option selected>Grau de instrução</option>
                    <option value="graduacao" {{$professor->grauInstrucao=="graduacao"?"selected='selected'":""}}>Graduação</option>
                    <option value="tecnologo" {{$professor->grauInstrucao=="tecnologo"?"selected='selected'":""}}>Tecnólogo</option>
                    <option value="tecnico" {{$professor->grauInstrucao=="tecnico"?"selected='selected'":""}}>Técnico</option>
                    <option value="pos-graduacao" {{$professor->grauInstrucao=="pos-graduacao"?"selected='selected'":""}}>Pós-graduação</option>
                    <option value="mestrdo" {{$professor->grauInstrucao=="mestrdo"?"selected='selected'":""}}>Mestrado</option>
                    <option value="phd" {{$professor->grauInstrucao=="phd"?"selected='selected'":""}}>Doutorado</option>
                </select>
            </div>
           <button class="btn" type="submit">Alterar</button>
           </div>
        </div>
    </form>
    {{--Importanto o freamework para achar o endereço pelo cep--}}
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="/js/consultaCEP.js"></script>
  {{-- <script type="text/javascript">
            var anoIngreso = document.querySelector('[data-ano]').value;
            //anoIngreso=anoIngreso-2000;
            var now = new Date;
            var anoAtual=now.getFullYear()-2000;
            anoCurso=(anoAtual-anoIngreso)+1;
            if(anoCurso>4){
                $("#anoCurso").append('<input type="text" class="input-home" placeholder="Ano do curso:" name="anoCurso">');
            }
</script>--}}
</body>
</html>