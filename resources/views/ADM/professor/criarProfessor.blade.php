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
        <h4 style="padding-left: 55px">Criar Professor</h4>
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
        <form class="container" action="{{route('ADM.criarProfessor')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="row">
            <div class="col-sm-3 py-2">
                <img src="img/upload-foto.png" class="selecionar-foto-criar-conta" alt="selecionar foto">
                <input type="file" name="fotoProfessor" style="height: 2.5rem; background-color: transparent;" id="fotoProfessor" placeholder="Foto:" class="form-control input-home">
                <p>Dados pessoais</p>
                <input type="text" name="name" placeholder="Nome:" class="input-home">
                <select name="sexo" class="form-control" id="Base_Combobox">
                    <option selected disabled>Sexo:</option>
                    <option value="m">Masculino</option>
                    <option value="f">Feminino</option>
                </select>
                <select class="form-control" name="estadoCivil" id="Base_Combobox" style="display: block;">
                    <option selected disabled>Estado civíl</option>
                    <option value="casado">Casado(a)</option>
                    <option value="solteiro">Solteiro(a)</option>
                    <option value="divorciado">Divorciado(a)</option>
                    <option value="viuvo">Viúvo</option>
                </select>
                <input type="text" name="nomeMae" placeholder="Nome da mãe:" class="input-home">
                <select type="text" name="TipoSanguineo" class="form-control" id="Base_Combobox" style="display: block;">
                     <option selected disabled>Tipo Sanguineo</option>
                     <option value="AB+">AB+</option>
                     <option value="AB-">AB-</option>
                     <option value="A+">A+</option>
                     <option value="A-">A-</option>
                     <option value="B+">B+</option>
                     <option value="B-">B-</option>
                     <option value="O+">O+</option>
                     <option value="O-">O-</option>
                </select>
                <label for="" style="font-size: 12px; padding: 5px;">Data de nascimento:</label>
                <input type="date"  name="dataNascimento" placeholder="Data de nascimento" class="input-home">
                <input type="text" name="naturalidade" placeholder="Naturalidade" class="input-home">
                <input type="text" name="nomeUsual" placeholder="Nome usual:" class="input-home">
                <select name="etnia" class="form-control" id="Base_Combobox" style="display: block;">
                    <option selected disabled>Etnia</option>
                    <option value="branco">Branco</option>
                    <option value="negro">Negro</option>
                    <option value="pardo">Pardo</option>
                    <option value="amarelo">Amarelo</option>
                </select>
            </div>       
            <div class="col-sm-3">
                <p>Documentação</p>
                <input type="text" name="rg" placeholder="RG" class="input-home">
                <label for="" style="font-size: 12px; padding-left:5px ;">Data de expedição do RG:</label>
                <input type="date"name="rgExpedicao"  placeholder="" class="input-home">
                <select type="text" name="ufExpeditor" class="form-control" id="Base_Combobox" style="display: block;">
                    <option selected disabled>Estado Expeditor</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="EX">Estrangeiro</option>
                </select>
                <input type="text" name="expeditorRg" class="input-home" placeholder="Orgão expedidor:">
                <input type="text" name="cpf" placeholder="CPF" class="input-home">
                <div id="contato">
                    <p>Contato</p>
                    <input type="text" name="numeroCelular" class="input-home" placeholder="Celular: (ex.81996376933)">
                    <input type="email" name="email" placeholder="E-mail:" class="input-home">
                    <input type="password" name="senha" placeholder="senha" class="input-home">
                </div>
            </div>
            <div class="col-sm-3">
                <p>Endereço</p>
                <input id="cep" type="number" class="input-home" placeholder="CEP:" name="cep" maxlength="8" minlength="8" required data-cep>
                <input type="text" class="input-home" placeholder="Estado:" style="background: #c1c8cf;" name="UF" id="uf" readonly >
                <input type="text" class="input-home" placeholder="Cidade:" style="background: #c1c8cf;" name="cidade" id="cidade" readonly >
                <input type="text" class="input-home" placeholder="Bairro:" style="background: #c1c8cf;" name="bairro" id="bairro" readonly >
                <input type="text" class="input-home" placeholder="Rua:" style="background: #c1c8cf;" name="rua" id="rua" readonly required>
                <input type="number" class="input-home" placeholder="Número:" name="numeroCasa" id="">
                <input type="text" class="input-home" placeholder="Complemento:" name="complementoCasa" id="">
            </div>
            <div class="col-sm-3">
                <p>Dados acadêmicos</p>
                <select name="modalidade" id="Base_Combobox" style="display: block;">
                    <option selected disabled>Modalidade de contratação</option>
                    <option value="efetivo">Efetivo</option>
                    <option value="substituto">Substituto</option>
                    <option value="terceirizado">Terceirizado</option>
                </select>
                <select name="categoria" id="Base_Combobox" style="display: block;" disabled >
                    <option>Professor</option>
                </select>
                <select name="grauInstrucao" id="Base_Combobox" style="display: block;">
                    <option selected disabled>Grau de instrução</option>
                    <option value="ensino-medio">Ensino Médio</option>
                    <option value="graduacao">Graduação</option>
                    <option value="tecnologo">Tecnólogo</option>
                    <option value="tecnico">Técnico</option>
                    <option value="pos-graduacao">Pós-graduação</option>
                    <option value="mestrdo">Mestrado</option>
                    <option value="phd">Doutorado</option>
                </select>
                <select name="profissao" id="Base_Combobox">
                    <option selected disabled>Profissão</option>
                    <option value="professor">Professor</option>
                    <option value="pesquisador">Pesquisador</option>
                </select>
            </div>
           <button class="btn" type="submit">Salvar</button>
           </div>
        </div>
    </form>
</body>
{{--Importanto o freamework para achar o endereço pelo cep--}}
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="/js/consultaCEP.js"></script>
</html>