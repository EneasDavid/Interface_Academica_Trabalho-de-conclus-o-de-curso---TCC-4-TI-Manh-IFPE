<!doctype html>
<html lang="ptbr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/style.css" rel="stylesheet">
    <title>Sistema Acadêmico</title>
    <style>
        .categoria {
            margin-top: -15px;
        }
    </style>
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
                <li class="nav-item bg-light aluno">
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


    <!--corpo-->
    <main style=" height: 90%;">
        <div class="container">
            <div class="row" style="height: 100%;">
                <div class="col-sm-6" style="padding-top: 2rem;">
                    <div class="">
                        <p class="login-texto1">Aluno, bem-vindo ao</p>
                        <p class="login-texto2">Sis. Acadêmico</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm" >
                                <div class="" style="text-align: right;">
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
                                <form action="{{route('Aluno.login')}}" method="POST">
                                @csrf 
                                <input type="text" class="input form-control" name="matricula" placeholder="Matrícula:" style="display: block; width: 100%;">
                                <input type="password" class="input form-control" name="password" placeholder="Senha:" style="display:block ;width: 100%;">
                                <div class="esqueceuSenha-Login">
                                    <a href="/esqueceuSenha" class="btn" style="background-color: transparent;">Recuperar senha</a> 
                                    <button class="botao" type="submit" >Entrar</button>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/js/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="/js/script.js"></script>
    </main>
</body>
</html>