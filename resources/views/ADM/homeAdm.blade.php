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
        <a href="logout"><img src="img/sair.png" alt="clique para voltar" height="21px"></a>
        <h4 style="padding-left: 55px">Home</h4>
    </div>
    @if (session('msg'))
        <p class="alert alert-success">{{session('msg')}}</p>
    @endif
    <div class="container">
        
        <div class="row">
            <div class="col-sm-4">
                 <a href="\criarAluno">
                     <div class="acaoAdministrativo">
                         <div class="middle">
                             <h1>Criar Aluno</h1>
                        </div>
                    </div>
                </a>

                <a href="\listarAlunos">  
                    <div class="acaoAdministrativo">
                        <div class="middle">
                             <h1>Listar Alunos</h1>
                         </div>
                    </div>
                </a>
                <a href="\editarTurma">
                    <div class="acaoAdministrativo">
                        <div class="middle">
                             <h1>Editar Turma</h1>
                        </div>
                    </div>
                </a>       
            </div>
            <div class="col-sm-4">
                <a href="\criarProfessor">
                     <div class="acaoAdministrativo">
                        <div class="middle">
                            <h1>Criar Professor</h1>
                        </div>
                    </div>
                </a>
                <a href="\listarProfessores">    
                    <div class="acaoAdministrativo">
                        <div class="middle">
                            <h1>Listar Professores</h1>    
                        </div>
                    </div>
                </a>
                <a href="\criarHorario">
                    <div class="acaoAdministrativo">
                        <div class="middle">
                             <h1>Criar Horario</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="\acervoBiblioteca"> 
                    <div class="acaoAdministrativo">
                        <div class="middle">
                                <h1>Biblioteca</h1>
                        </div>
                    </div>
                </a>
                <a href="\acervoBiblioteca-Emprestimos">
                <div class="acaoAdministrativo">
                    <div class="middle">
                        <h1>Consultar Empréstimos</h1>
                    </div>
                </div>
                </a>
                <a href="\editarHorario">
                    <div class="acaoAdministrativo">
                        <div class="middle">
                             <h1>Editar Horario</h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>
</html>