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
        <h4 style="padding-left: 55px">Editar Aluno</h4>
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
        <form class="container" action="/Forms-Aluno-Editar/{{$entidade->id}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="row">
            <div class="col-sm-3 py-2">
                @if(!empty($aluno->fotoAluno))
                     <p class="img"><img src="/img/alunos/{{$aluno->fotoAluno}}" class="selecionar-foto" style="padding:0 !important" alt="{{$aluno->fotoAluno}}" ></p>
                @else
                     <p class="img"><img src="/img/upload-foto.png" class="selecionar-foto" style="padding:0 !important" alt="{{$aluno->fotoAluno}}" ></p>
                @endif
                <input type="file" name="fotoAluno" style="height: 2.5rem; background-color: transparent;" id="fotoAluno" placeholder="Foto:" class="form-control input-home">
                <p>Dados pessoais</p>
                <input type="text" name="name" placeholder="Nome:" class="input-home" value="{{$entidade->name}}">
                <select name="sexo" class="form-control" id="Base_Combobox" value="{{$aluno->sexo}}">
                    <option selected disabled value="">Sexo:</option>
                    <option value="m" {{$aluno->sexo=="m"?"selected='selected'":""}}>Masculino</option>
                    <option value="f" {{$aluno->sexo=="f"?"selected='selected'":""}}>Feminino</option>
                </select>
                <select class="form-control" name="estadoCivil" id="Base_Combobox" style="display: block;">
                    <option selected disabled value="">Estado civíl</option>
                    <option value="solteiro" {{$aluno->estadoCivil=="solteiro"?"selected='selected'":""}}>Solteiro(a)</option>
                    <option value="casado" {{$aluno->estadoCivil=="casado"?"selected='selected'":""}}>Casado(a)</option>
                    <option value="divorciado" {{$aluno->estadoCivil=="divorciado"?"selected='selected'":""}}>Divorciado(a)</option>
                    <option value="viuvo" {{$aluno->estadoCivil=="viuvo"?"selected='selected'":""}}>Viúvo</option>
                </select>
                <input type="text" name="nomeMae" value="{{$aluno->nomeMae}}" placeholder="Nome da mãe:" class="input-home">
                <select type="text" name="TipoSanguineo"  class="form-control" id="Base_Combobox" style="display: block;">
                     <option selected disabled value="">Tipo Sanguineo</option>
                     <option value="AB+" {{$aluno->TipoSanguineo=="AB+"?"selected='selected'":""}}>AB+</option>
                     <option value="AB-" {{$aluno->TipoSanguineo=="AB-"?"selected='selected'":""}}>AB-</option>
                     <option value="A+" {{$aluno->TipoSanguineo=="A+"?"selected='selected'":""}}>A+</option>
                     <option value="A-" {{$aluno->TipoSanguineo=="A-"?"selected='selected'":""}}>A-</option>
                     <option value="B+" {{$aluno->TipoSanguineo=="B+"?"selected='selected'":""}}>B+</option>
                     <option value="B-" {{$aluno->TipoSanguineo=="B-"?"selected='selected'":""}}>B-</option>
                     <option value="O+" {{$aluno->TipoSanguineo=="O+"?"selected='selected'":""}}>O+</option>
                     <option value="O-" {{$aluno->TipoSanguineo=="O-"?"selected='selected'":""}}>O-</option>
                </select>
                <label for="" style="font-size: 12px; padding: 5px;">Data de nascimento:</label>
                <input type="date" name="dataNascimento" value="{{$aluno->dataNascimento}}" placeholder="Data de nascimento" class="input-home">
                <input type="text" name="naturalidade" value="{{$aluno->naturalidade}}" placeholder="Naturalidade" class="input-home">
                <input type="text" name="nomeUsual" value="{{$aluno->nomeUsual}}" placeholder="Nome usual:" class="input-home">
                <select name="etnia" class="form-control" id="Base_Combobox" style="display: block;">
                    <option selected disabled value="">Etnia</option>
                    <option value="branco" {{$aluno->etnia=="branco"?"selected='selected'":""}}>Branco</option>
                    <option value="negro" {{$aluno->etnia=="negro"?"selected='selected'":""}}>Negro</option>
                    <option value="pardo" {{$aluno->etnia=="pardo"?"selected='selected'":""}}>Pardo</option>
                    <option value="amarelo" {{$aluno->etnia=="amarelo"?"selected='selected'":""}}>Amarelo</option>
                </select>
            </div>       
            <div class="col-sm-3">
                <p>RG</p>
                <input type="text" name="rg" value="{{$aluno->rg}}" placeholder="RG" class="input-home">
                <label for="" style="font-size: 12px; padding-left:5px ;">Data de expedição do RG:</label>
                <input type="date"name="rgExpedicao"  value="{{$aluno->rgExpedicao}}" placeholder="" class="input-home">
                <select type="text" name="ufExpeditor" class="form-control" id="Base_Combobox" style="display: block;">
                    <option selected disabled value="">Estado Expeditor</option>
                    <option value="AC" {{$aluno->ufExpeditor=="AC"?"selected='selected'":""}}>Acre</option>
                    <option value="AL" {{$aluno->ufExpeditor=="AL"?"selected='selected'":""}}>Alagoas</option>
                    <option value="AP" {{$aluno->ufExpeditor=="AP"?"selected='selected'":""}}>Amapá</option>
                    <option value="AM" {{$aluno->ufExpeditor=="AM"?"selected='selected'":""}}>Amazonas</option>
                    <option value="BA" {{$aluno->ufExpeditor=="BA"?"selected='selected'":""}}>Bahia</option>
                    <option value="CE" {{$aluno->ufExpeditor=="CE"?"selected='selected'":""}}>Ceará</option>
                    <option value="DF" {{$aluno->ufExpeditor=="DF"?"selected='selected'":""}}>Distrito Federal</option>
                    <option value="ES" {{$aluno->ufExpeditor=="ES"?"selected='selected'":""}}>Espírito Santo</option>
                    <option value="GO" {{$aluno->ufExpeditor=="GO"?"selected='selected'":""}}>Goiás</option>
                    <option value="MA" {{$aluno->ufExpeditor=="MA"?"selected='selected'":""}}>Maranhão</option>
                    <option value="MT" {{$aluno->ufExpeditor=="MT"?"selected='selected'":""}}>Mato Grosso</option>
                    <option value="MS" {{$aluno->ufExpeditor=="MS"?"selected='selected'":""}}>Mato Grosso do Sul</option>
                    <option value="MG" {{$aluno->ufExpeditor=="MG"?"selected='selected'":""}}>Minas Gerais</option>
                    <option value="PA" {{$aluno->ufExpeditor=="PA"?"selected='selected'":""}}>Pará</option>
                    <option value="PB" {{$aluno->ufExpeditor=="PB"?"selected='selected'":""}}>Paraíba</option>
                    <option value="PR" {{$aluno->ufExpeditor=="PR"?"selected='selected'":""}}>Paraná</option>
                    <option value="PE" {{$aluno->ufExpeditor=="PE"?"selected='selected'":""}}>Pernambuco</option>
                    <option value="PI" {{$aluno->ufExpeditor=="PI"?"selected='selected'":""}}>Piauí</option>
                    <option value="RJ" {{$aluno->ufExpeditor=="RJ"?"selected='selected'":""}}>Rio de Janeiro</option>
                    <option value="RN" {{$aluno->ufExpeditor=="RN"?"selected='selected'":""}}>Rio Grande do Norte</option>
                    <option value="RS" {{$aluno->ufExpeditor=="RS"?"selected='selected'":""}}>Rio Grande do Sul</option>
                    <option value="RO" {{$aluno->ufExpeditor=="RO"?"selected='selected'":""}}>Rondônia</option>
                    <option value="RR" {{$aluno->ufExpeditor=="RR"?"selected='selected'":""}}>Roraima</option>
                    <option value="SC" {{$aluno->ufExpeditor=="SC"?"selected='selected'":""}}>Santa Catarina</option>
                    <option value="SP" {{$aluno->ufExpeditor=="SP"?"selected='selected'":""}}>São Paulo</option>
                    <option value="SE" {{$aluno->ufExpeditor=="SE"?"selected='selected'":""}}>Sergipe</option>
                    <option value="TO" {{$aluno->ufExpeditor=="TO"?"selected='selected'":""}}>Tocantins</option>
                    <option value="EX" {{$aluno->ufExpeditor=="EX"?"selected='selected'":""}}>Estrangeiro</option>
                </select>
                <input type="text" name="expeditorRg" value="{{$aluno->expeditorRg}}" class="input-home" placeholder="Orgão expedidor:">
                <input type="text" name="cpf" value="{{$aluno->cpf}} "placeholder="CPF" class="input-home">
                <div id="contato">
                    <p>Contato</p>
                    <input type="text" name="numeroCelular" value="{{$aluno->numeroCelular}}" class="input-home" placeholder="Celular: (ex.81996376933)">
                    <input type="email" name="email" value="{{$entidade->email}}" placeholder="E-mail:" class="input-home">
                    <input type="text" name="matricula" value="{{$entidade->matricula}}" placeholder="Matricula:" class="input-home">
                   </div>
            </div>
            <div class="col-sm-3">
                <p>Endereço</p>
                <input id="cep" type="number" class="input-home" placeholder="CEP:" value="{{$aluno->cep}}" name="cep" maxlength="8" minlength="8" required data-cep>
                <input type="text" class="input-home" placeholder="Estado:" style="background: #c1c8cf;" value="{{$aluno->UF}}" name="UF" id="uf" readonly >
                <input type="text" class="input-home" placeholder="Cidade:" style="background: #c1c8cf;" value="{{$aluno->cidade}}" name="cidade" id="cidade" readonly >
                <input type="text" class="input-home" placeholder="Bairro:" style="background: #c1c8cf;" value="{{$aluno->bairro}}" name="bairro" id="bairro" readonly >
                <input type="text" class="input-home" placeholder="Rua:" style="background: #c1c8cf;" value="{{$aluno->rua}}" name="rua" id="rua" readonly required>
                <input type="number" class="input-home" placeholder="Número:" name="numeroCasa" value="{{$aluno->numeroCasa}}" id="">
                <input type="text" class="input-home" placeholder="Complemento:" name="complementoCasa" value="{{$aluno->complementoCasa}}" id="">
            </div>
            <div class="col-sm-3">
                <p>Dados acadêmicos</p>
                <input class="input-home" name="nivelAcesso" style="background: #c1c8cf;" value="aluno" readonly>
                <input class="input-home" name="grauInstrucao" style="background: #c1c8cf;" value="ensino-medio" readonly>
                <select name="curso" class="form-control" id="Base_Combobox" style="display: block;">
                    <option selected disabled value="">Curso</option>
                    <option value="TMA" {{$aluno->curso=="TMA"?"selected='selected'":""}} >TMA</option>
                    <option value="TI" {{$aluno->curso=="TI"?"selected='selected'":""}} >TI</option>
                    <option value="TEE" {{$aluno->curso=="TEE"?"selected='selected'":""}} >TEE</option>
                </select>
                <select name="anoIngreso" readonly class="form-control" id="Base_Combobox" data-ano style="display: block;">
                    <option value="{{$aluno->anoIngreso}}">20{{$aluno->anoIngreso}}</option>
                </select>
                <select name="anoCurso" class="form-control" id="Base_Combobox" style="display: block;">
                    <option disabled selected value="">Ano do curso</option>
                    <option value="1" {{$aluno->anoCurso==1?"selected='selected'":""}}>1 ano</option>
                    <option value="2" {{$aluno->anoCurso==2?"selected='selected'":""}}>2 ano</option>
                    <option value="3" {{$aluno->anoCurso==3?"selected='selected'":""}}>3 ano</option>
                    <option value="4" {{$aluno->anoCurso==4?"selected='selected'":""}}>4 ano</option>
                </select>
                <div id="anoCurso"></div>
                <label for="internaSelecao" >Turno:</label>
                <div class="matricula selecao">
                    <div class="internaSelecao">
                        <label class="container" style="display: flex;flex-direction: column;align-items: center;">Manhã
                            <input name="turno" type="radio" checked="checked" value="Manhã">
                                <span class="checkmark"></span>
                            </label>
                        <label class="container" style="display: flex;flex-direction: column;align-items: center;">Tarde
                            <input name="turno" type="radio" checked="checked" value="Tarde">
                                <span class="checkmark"></span>
                        </label>
                        </div>
                    </div>
              </div>
           <button class="btn" type="submit">Alterar</button>
           </div>
    </form>
    {{--Importanto o freamework para achar o endereço pelo cep--}}
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="/js/consultaCEP.js"></script>
</body>
</html>