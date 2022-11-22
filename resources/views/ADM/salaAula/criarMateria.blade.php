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
        <a href="turma.html"><img src="/img/voltar.png" alt="clique para voltar" height="21px"></a>
        <h4 style="padding-left: 55px">Criar matéria</h4>
    </div>
    <div class="container" style="display: block;">
        <div class="row">
            <form action="">
                <input type="text" name="nome-materia" class="input-home" placeholder="Nome da matéria: ">
                <select name="professor-materia" id="Base_Combobox">
                    <option disabled select>Professor</option>
                    <option value="1">David Alain do Nascimento</option>
                </select>
                <button class="btn" style="display: block; margin-top: 15px;text-align: center;">Salvar
                    matéria</button>

            </form>
        </div>
    </div>

</body>

</html>