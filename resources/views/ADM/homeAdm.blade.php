<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/style.css" rel="stylesheet">
        <title>Sistema Acadêmico</title>
    </head>
    <style>
        .col-sm-3 {
            padding-top: 1rem !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
    </style>
<body>
    <div style="display: flex;justify-content: space-between;">
        <h4 style="padding-left: 55px">Home</h4>
        <a href="logout" style="padding-right: .8rem;"><img src="img/sair.png" alt="clique para voltar" height="21px"></a>
    </div>
    @if (session('msg'))
        <p class="alert alert-success">{{session('msg')}}</p>
    @endif
    <div style="">
        <div class="row" >
            @if(count($salas)>0)
                <div class="col-sm-3">
                    <div class=" bg-light" style="height: 200px; border-radius: 3%; text-align:center; margin-top: 10px;">
                        <a href="\criarAluno">
                            <div class="middle">
                                <h1>Criar Aluno</h1>
                            </div>
                        </a>
                    </div>
                </div>
            @else
            <div class="col-sm-3">
                    <div class=" bg-light" style="height: 200px; border-radius: 3%; text-align:center; margin-top: 10px;">
                            <div class="middle">
                                <h1>Criar Aluno</h1>
                            </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-3">
                 <div class=" bg-light" style="height: 200px; border-radius: 3%; text-align:center; margin-top: 10px;">
                     <a href="\listarAlunos">
                     <div class="middle">  
                        <h1>Listar Alunos</h1>
                    </div>
                    </a>
                 </div>
            </div>
            <div class="col-sm-3">
                 <div class=" bg-light" style="height: 200px; border-radius: 3%; text-align:center; margin-top: 10px;">
                     <a href="\criarProfessor">  
                     <div class="middle">  
    
                        <h1>Criar Professor</h1>
                        </div>
                    </a>
                 </div>
            </div>
            <div class="col-sm-3">
                 <div class=" bg-light" style="height: 200px; border-radius: 3%; text-align:center; margin-top: 10px;">
                     <a href="\listarProfessores">  
                     <div class="middle">  
    
                        <h1>Listar Professores</h1>
                        </div>
                    </a>
                 </div>
            </div>
        </div>
        <div class="row" style="padding-bottom: 2rem;">
            <div class="col-sm-3">
                 <div class=" bg-light" style="height: 200px; border-radius: 3%; text-align:center; margin-top: 10px;">
                     <a href="\editarTurma">  
                     <div class="middle">  
    
                        <h1>Editar Turma</h1>
                        </div>
                    </a>
                 </div>
            </div>
            <div class="col-sm-3">
                 <div class=" bg-light" style="height: 200px; border-radius: 3%; text-align:center; margin-top: 10px;">
                     <a href="\criarMateria">  
                        <div class="middle">  
                             <h1>Criar Materia</h1>
                        </div>
                    </a>
                 </div>
            </div>
            <div class="col-sm-3">
                 <div class=" bg-light" style="height: 200px; border-radius: 3%; text-align:center; margin-top: 10px;">
                     <a href="\acervoBiblioteca">  
                        <div class="middle">  
                             <h1>Biblioteca</h1>
                        </div>
                    </a>
                 </div>
            </div>
            <div class="col-sm-3">
                 <div class=" bg-light" style="height: 200px; border-radius: 3%; text-align:center; margin-top: 10px;">
                     <a href="\acervoBiblioteca-consultar-Emprestimos">
                        <div class="middle">  
                            <h1>Consultar Empréstimos</h1>
                        </div>  
                    </a>
                 </div>
            </div>
        </div>
    </div>
</body>
</html>