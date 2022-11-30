<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/style.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Sistema Acadêmico</title>
</head>

<body>
<!--menu-->
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
                    <a class="nav-link aluno" style="width: auto;" href="#">
                        <li class="nav-item" style="height: 100%;">
                            <div class="">
                                Boletim
                            </div>
                        </li>
                    </a>
                    <a class="nav-link aluno" style="width: auto;" href="#">
                        <li class="nav-item" style="height: 100%;">
                            <div class="">
                                Solicitar Documentos
                            </div>
                        </li>
                    </a>
                    <a class="nav-link aluno" style="width: auto;" href="#">
                        <li class="nav-item" style="height: 100%;">
                            <div class="">
                                Matrizes curriculares
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
        <h4 style="padding-left: 55px">Calendário Acadêmico</h4>
    </div>
    <div class="container" style="display: block;height: 80%;">
        <div class="row" style="justify-content: center;height: 30%;">
            <div class="col-sm">
                <iframe
                    src="https://calendar.google.com/calendar/embed?height=300&wkst=1&bgcolor=%239ee1ad&ctz=America%2FSao_Paulo&showTitle=1&showNav=1&showPrint=0&showTabs=0&showCalendars=0&showTz=0&title=Calend%C3%A1rio%20acad%C3%AAmico&showDate=1&src=cHQuYnJhemlsaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%230B8043"
                    width="100%" height="300%" frameborder="0" scrolling="no"></iframe>
            </div>

        </div>
    </div>
    </div>
    </div>
    <script src="/js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/js/script.js"></script>
</body>

</html>