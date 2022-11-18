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
        <!--menu-->
        <nav class="navbar navbar-expand-lg navbar-light navAjuste">
        <a class="navbar-text" href="#">Login</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="color: #000;">
            <ul class="navbar-nav">
                <li class="nav-item aluno">
                    <a class="nav-link" href="/">Aluno</a>
                </li>
                <li class="nav-item aluno">
                    <a class="nav-link" href="/loginProfessor">Professor</a>
                </li>
                <li class="nav-item aluno">
                    <a class="nav-link" href="/loginAdm">Administrativo</a>
                </li>
            </ul>
        </div>
    </nav>

    <div style="display: flex; flex-direction: column; height: 70%; text-align: center;">
        <div class="middle">
            <p>Insira o e-mail de cadastro:</p>
            <form action="{{route('recSenhaToEmail')}}" method="POST">
                @csrf
                <input type="email" class="input" name="email" placeholder="E-mail: ">
                <button class="botao" type="submit" >Recuperar</button>
            </form>
        </div>
    </div>

</body>

</html>