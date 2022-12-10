<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/style.css" rel="stylesheet">
    <script src="/code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Sistema Acadêmico</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="navAjuste">
        <a class="navbar-text" href="/homeAluno">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="color: #000;">
            <ul class="navbar-nav aluno">
                <a class="nav-link aluno" style="width: auto;" href="alterarSenhaToAluno">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Alterar senha
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="/acervoBibliotecaToAluno">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Biblioteca
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="/emprestimoLivro">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Emprestimos
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="/calendarioAcademico">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Calendário Acadêmico
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="/boletim">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Boletim
                        </div>
                    </li>
                </a>
                <a class="nav-link aluno" style="width: auto;" href="/solicitarDoc">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Solicitar Documentos
                        </div>
                    </li>
                </a>

                @if(!empty($aluno->renovarMatricula))
                <a class="nav-link aluno" style="width: auto;" href="#">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                            Renovar Matricula
                        </div>
                    </li>
                </a>
                @endif
                <a class="nav-link aluno" style="width:auto;" href="/logout">
                    <li class="nav-item" style="height: 100%;">
                        <div class="">
                             Sair
                        </div>
                    </li>
                </a>
            </ul>
    </div>
    </div>
</nav>
    <div style="display: flex;">
        <h4 style="padding-left: 55px">Solicitar documentos</h4>
    </div>
    <div class="container" style="display: flex;justify-content: space-around;">
        <div class="row" style="margin-top: 13rem;">
            <form class="container" action="/gerarPDF" method="post">
                @csrf
                <select name="solicitarDocumento" id="Base_Combobox" style="margin:5px ;">
                    <option value="historico">Histórico escolar</option>
                    <option value="boletim">Boletim</option>
                    <option value="atestado-matricula">Atestado de Matrícula</option>
                    <option value="conclusao">Declaração de conclusão</option>
                </select>
                <button class="btn" style="display: block;margin:5px ;">Solicitar</button>
            </form>
        </div>
    </div>

    <script src="/js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/js/script.js"></script>
</body>

</html>