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
        <a href="/dadosTurma/{{$turma->id}}"><img src="/img/voltar.png" alt="clique para voltar" height="21px"></a>
        <h4 style="padding-left: 55px">Home</h4>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <p class="titulo"><b>Horário do {{$turma->serie}}° {{$turma->curso}} {{$turma->turno}}</b></p>
            <div class="">
                <div class="table-responsive" style="text-align: center;">
                    <table class="dia" style="width: 100%; margin: 5px; text-align: center;">
                        <thead>
                            <tr>
                            <th scope="col" class="dia">Hora</th>
                            </tr>
                        </thead>
                        <tbody style="margin-top: 5px;">
                        @if($turma->turno=='Manhã')
                        <tr>
                            <td>
                                <p1 class="materia">07:30~08:14</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">08:15~08:59</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">09:00~09:45</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">10:00~10:44</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">10:45~11:29</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">11:30~12:15</p1>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td>
                                <p1 class="materia">13:00~13:44</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">13:45~14:29</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">14:30~15:15</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">15:30~16:14</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">16:15~16:59</p1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p1 class="materia">17:00~17:45</p1>
                            </td>
                        </tr>
                        @endif
                    </table>
                    <table class="" style="width: 100%;text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col" class="dia">Segunda-feira</th>
                            </tr>
                        </thead>
                        <tbody style="margin-top: 5px;">
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                 <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="" style="width: 100%;text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col" class="">Terça-feira</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            <tr>
                            <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="" style="width: 100%;text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col" class="dia">Quarta-feira</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="" style="width: 100%;text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col" class="dia">Quinta-feira</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="" style="width: 100%;text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col" class="dia">Sexta-feira</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            <tr>
                            <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                 <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                            <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p1 class="materia">Matéria</p1>
                                    <p1 class="pofessor">Professor</p1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="/js/alterarCorTabela.js"></script>
<script src="/js/jquery.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/js/script.js"></script>
</body>
</html>