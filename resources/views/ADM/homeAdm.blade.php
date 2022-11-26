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
    <div style="display: flex;justify-content: space-between;">
        <h4 style="padding-left: 55px">Home</h4>
        <a href="logout" style="padding-right: .8rem;"><img src="img/sair.png" alt="clique para voltar" height="21px"></a>
    </div>
    @if (session('msg'))
        <p class="alert alert-success">{{session('msg')}}</p>
    @endif
    <div class="container">
        <div style="height: 90%;display: flex; flex-wrap: wrap; justify-content: space-around;">
            @if(count($salas)>0)
                 <a class="row" href="\criarAluno" style="margin-bottom: 1rem;">
                     <div class="acaoAdministrativo">
                         <div class="middle" style="padding:10px">
                             <h1>Criar Aluno</h1>
                        </div>
                    </div>
                </a>
        @else
                 <a class="row" href="#" style="margin-bottom: 1rem;">
                     <div class="acaoAdministrativo" title="ainda não há turmas, logo não pode inserir um estudante">
                         <div class="middle" style="padding:10px">
                             <h1>Criar Aluno</h1>
                        </div>
                    </div>
                </a>
        @endif
                <a class="row" href="\listarAlunos" style="margin-bottom: 1rem;">  
                    <div class="acaoAdministrativo">
                        <div class="middle" style="padding:10px" >
                             <h1>Listar Alunos</h1>
                         </div>
                    </div>
                </a>       
                <a class="row" href="\criarProfessor" style="margin-bottom: 1rem;">
                     <div class="acaoAdministrativo">
                        <div class="middle" style="padding:10px">
                            <h1>Criar Professor</h1>
                        </div>
                    </div>
                </a>
                <a class="row" href="\listarProfessores" style="margin-bottom: 1rem;">    
                    <div class="acaoAdministrativo">
                        <div class="middle" style="padding:10px">
                            <h1>Listar Professores</h1>    
                        </div>
                    </div>
                </a>
                <a class="row" href="\editarTurma" style="margin-bottom: 1rem;">
                    <div class="acaoAdministrativo">
                        <div class="middle" style="padding:10px">
                             <h1>Editar Turma</h1>
                        </div>
                    </div>
                </a>
                <a class="row" href="\criarMateria" style="margin-bottom: 1rem;">
                    <div class="acaoAdministrativo">
                        <div class="middle" style="padding:10px">
                             <h1>Criar Materia</h1>
                        </div>
                    </div>
                </a>
                <a class="row" href="\acervoBiblioteca" style="margin-bottom: 1rem;"> 
                    <div class="acaoAdministrativo">
                        <div class="middle" style="padding:10px">
                                <h1>Biblioteca</h1>
                        </div>
                    </div>
                </a>
                <a class="row" href="\acervoBiblioteca-consultar-Emprestimos" style="margin-bottom: 1rem;">
                    <div class="acaoAdministrativo">
                        <div class="middle" style="">
                            <h1>Consultar Empréstimos</h1>
                        </div>
                    </div>
                </a>
        </div>
    </div>

</body>
</html>