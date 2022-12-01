<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\address;
use App\Models\professor;
use App\Models\salaAula;
use App\Models\materia;
use App\Models\Livros;
use App\Models\dados__aula__por__aluno;

class ADMController extends Controller
{
        //Login
        public function indexADM()
        {
            //dd(Hash::make('.'));
            return view('ADM.loginAdm');
        }
        public function loginADM(Request $request)
        {
            $this->validate($request,[
                'matricula'=>'required',
                'password'=>'required'
            ],[
                /*Metodo para passar todas as variaveis que são obrigatorias de uma vez, isso representa uma vulnerabilidade já que diz o nome da variavel no banco de dados
                'required' => 'A :attribute é um campo obrigartorio!',*/
                'matricula.required'=>'O campo Matrícula é obrigatorio',
                'password.required'=>'O campo Senha é obrigatorio',
                
            ]);
            $adm=User::where('matricula',$request->matricula)->first(); 
            if($adm && Hash::check($request->password,$adm->password)){
                Auth::loginUsingId($adm->id);
                return redirect('/homeAdm');
            }else{
                return redirect()->back()->with('danger','Matricula ou senha invalida!');
            }
        }
        //after login
        public function homeADM()
        {
            $salaAula=salaAula::all();
            return view('ADM.homeAdm',['salas'=>$salaAula]);
        }
        
        //------------------------------Criar Aluno------------------------------
        public function criarAluno()
        {
            return view('ADM.aluno.criarAluno');
        }
        public function criarAlunoForms(Request $request)
        {
           //Criadno a entidade
            $novoUsuario = new User;
            $novoAlunoTurma = new salaAula;
            $novoAluno = new address;
            //$novoAlunoTurma = new salaAula;
            $this->validate($request,[
                'name'=>'required',
                'nomeMae'=>'required',
                'dataNascimento'=>'required',
                'naturalidade'=>'required',
                'etnia'=>'required',
                'rg'=>'required',
                'rgExpedicao'=>'required',
                'ufExpeditor'=>'required',
                'expeditorRg'=>'required',
                'cpf'=>'required',
                'email'=>'required',
                'curso'=>'required',
                'senha'=>'required',
                'anoIngreso'=>'required',
                'turno'=>'required',
                'numeroCasa'=>'required'
                ],[
                    //'required' => ':attribute é um campo obrigartorio!', //Idem do de cima
                    'name.required'=>'O campo Nome é obrigatorio',
                    'nomeMae.required'=>'O campo Nome da Mãe é obrigatorio',
                    'dataNascimento.required'=>'O campo Data de Nascimento é obrigatorio',
                    'naturalidade.required'=>'O campo Naturalidade é obrigatorio',
                    'etnia.required'=>'O campo Etina é obrigatorio',
                    'rg.required'=>'O campo RG é obrigatorio',
                    'rgExpedicao.required'=>'O campo Data de expedição do RG é obrigatorio',
                    'ufExpeditor.required'=>'O campo UF do Expeditor é obrigatorio',
                    'expeditorRg.required'=>'O campo Expeditor do RG é obrigatorio',
                    'cpf.required'=>'O campo CPF é obrigatorio',
                    'email.required'=>'O campo E-Mail é obrigatorio',
                    'senha.required'=>'O campo senha é obrigatorio',
                    'anoIngreso.required'=>'O campo Ano de Ingresso é obrigatorio',
                    'turno.required'=>'O campo Turno é obrigatorio',
                    'anoCurso.required'=>'O campo ano do Curso é obrigatorio',
                    'numeroCasa.required'=>'O campo Número da casa é obrigatorio',
            ]);
            //Passando os valores da web/request pro bd
            $novoUsuario->name = $request->name;
            $novoUsuario->email = $request->email;
            $novoUsuario->password = Hash::make($request->senha);
            $novoAluno->curso=$request->curso;
            /*    2019         1D12GR         0692
            anoIntreso          curso      valores aleatorios*/
            if($request->curso=="TEE"){
                $codCurso="1F2";
            }elseif($request->curso=="TI"){
                $codCurso="1D12";
            }else{
                $codCurso="1E12";
            }
                $novoUsuario->matricula=$request->anoIngreso.$codCurso."GR".rand(0000, 9999);
                //Salvar o usuario e depois lincar com o aluno
                $novoAluno->sexo=$request->sexo;
                $novoAluno->estadoCivil=$request->estadoCivil;
                $novoAluno->nomeMae=$request->nomeMae;
                $novoAluno->TipoSanguineo=$request->TipoSanguineo;
                $novoAluno->dataNascimento=$request->dataNascimento;
                $novoAluno->naturalidade=$request->naturalidade;
                $novoAluno->nomeUsual=$request->nomeUsual;
                $novoAluno->etnia=$request->etnia;
                $novoAluno->rg=$request->rg;
                $novoAluno->rgExpedicao=$request->rgExpedicao;
                $novoAluno->ufExpeditor=$request->ufExpeditor;
                $novoAluno->expeditorRg=$request->expeditorRg;
                $novoAluno->cpf=$request->cpf;
                $novoAluno->numeroCelular=$request->numeroCelular;
                $novoAluno->cep=$request->cep;
                $novoAluno->UF=$request->UF;
                $novoAluno->cidade=$request->cidade;
                $novoAluno->bairro=$request->bairro;
                $novoAluno->rua=$request->rua;
                $novoAluno->numeroCasa=$request->numeroCasa;
                $novoAluno->complementoCasa=$request->complementoCasa;
                $novoAluno->grauInstrucao=$request->grauInstrucao;
                $novoAluno->turno=$request->turno;
                $novoAluno->anoIngreso=$request->anoIngreso-2000;
                $novoAluno->anoCurso=$request->anoCurso;
                //Nível de acesso de aluno é o acesso dois
                $novoAluno->nivelAcesso=2;
                //Upload de imagem
                if($request->hasfile('fotoAluno') && $request->file('fotoAluno')->isValid()){
                //Pega a imagem
                    $requestImagem=$request->fotoAluno;
                //pega a extensão
                    $extension=$requestImagem->extension();
                //cria o nome da imagem
                    $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now").".".$extension);
                //move para a pasta das imagens
                    $requestImagem->move(public_path('img/alunos'),$imagemName);
                //salva no bd
                    $novoAluno->fotoAluno=$imagemName;
                }
                
                
                //Adicionando aluno na turma
                $novoAlunoTurma=salaAula::where('curso',$request->curso)->where('serie',$novoAluno->anoCurso)->where('turno',$request->turno)->first();
                //tosql pra vê o código no dd
                if(!empty($novoAlunoTurma)){
                    $novoUsuario->save();
                    $novoAluno->id_usuario_to_aluno=$novoUsuario->id;
                    $novoAluno->id_salaAula=$novoAlunoTurma->id;
                    $novoAluno->save();
                }
                //redirecionando a página
                return redirect('homeAdm')->with('msg','Aluno cadastrado com sucesso!');
        }
        public function editarAluno($id)
        {
            $aluno=address::findOrFail($id);
            if(empty($aluno)){
                return redirect('/listarAlunos');
            }
            $entidade=user::findOrFail($aluno->id_usuario_to_aluno);
            return view('ADM.aluno.editarAluno',['aluno'=>$aluno, 'entidade'=>$entidade]);
        }
        public function editarAlunoForms(Request $request)
        {
            $alunoAtualizado = new address;
            $usuarioAtualizado = new User;

            $this->validate($request,[
                'name'=>'required',
                'nomeMae'=>'required',
                'naturalidade'=>'required',
                'etnia'=>'required',
                'rg'=>'required',
                'rgExpedicao'=>'required',
                'ufExpeditor'=>'required',
                'expeditorRg'=>'required',
                'cpf'=>'required',
                'email'=>'required',
                'curso'=>'required',
                'turno'=>'required',
                'numeroCasa'=>'required'
            ],[
                //'required' => ':attribute é um campo obrigartorio!', //Idem do de cima
                'name.required'=>'O campo Nome é obrigatorio',
                'nomeMae.required'=>'O campo Nome da Mãe é obrigatorio',
                'dataNascimento.required'=>'O campo Data de Nascimento é obrigatorio',
                'naturalidade.required'=>'O campo Naturalidade é obrigatorio',
                'etnia.required'=>'O campo Etina é obrigatorio',
                'rg.required'=>'O campo RG é obrigatorio',
                'rgExpedicao.required'=>'O campo Data de expedição do RG é obrigatorio',
                'ufExpeditor.required'=>'O campo UF do Expeditor é obrigatorio',
                'expeditorRg.required'=>'O campo Expeditor do RG é obrigatorio',
                'cpf.required'=>'O campo CPF é obrigatorio',
                'email.required'=>'O campo E-Mail é obrigatorio',
                'anoIngreso.required'=>'O campo Ano de Ingresso é obrigatorio',
                'turno.required'=>'O campo Turno é obrigatorio',
                'numeroCasa.required'=>'O campo Número da casa é obrigatorio',
            ]);
            user::findOrFail($request->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'matricula'=>$request->matricula,
            ]);
            $alunoAtualizado->turno=$request->turno;
            $alunoAtualizado->curso=$request->curso;
            $alunoAtualizado->anoCurso=$request->anoCurso;
            $alunoAtualizado->turma=salaAula::where('curso',$alunoAtualizado->curso)->where('serie',$alunoAtualizado->anoCurso)->where('turno',$alunoAtualizado->turno)->first();
            
            //Upload de imagem
            if($request->hasfile('imagem') && $request->file('imagem')->isValid()){
                $requestImagem=$request->imagem;
                //Pega a imagem
                $extension=$requestImagem->extension();
                //pega a extensão
                $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now").".".$extension);
                //cria o nome da imagem
                $request->imagem->move(public_path('img/events'),$imagemName);
                //salva no bd
                $alunoAtualizado['imagem']=$imagemName;
            }
            address::where('id_usuario_to_aluno', 'like', '%'.$usuarioAtualizado->id.'%')->update([
                'sexo'=>$request->sexo,
                'curso'=>$alunoAtualizado->curso,
                'estadoCivil'=>$request->estadoCivil,
                'nomeMae'=>$request->nomeMae,
                'TipoSanguineo'=>$request->TipoSanguineo,
                'dataNascimento'=>$request->dataNascimento,
                'naturalidade'=>$request->naturalidade,
                'nomeUsual'=>$request->nomeUsual,  
                'etnia'=>$request->etnia,                
                'rg'=>$request->rg,
                'rgExpedicao'=>$request->rgExpedicao,
                'ufExpeditor'=>$request->ufExpeditor,
                'expeditorRg'=>$request->expeditorRg,
                'cpf'=>$request->cpf,
                'numeroCelular'=>$request->numeroCelular,
                'cep'=>$request->cep,
                'UF'=>$request->UF,
                'cidade'=>$request->cidade,
                'bairro'=>$request->bairro,
                'rua'=>$request->rua,
                'numeroCasa'=>$request->numeroCasa,
                'complementoCasa'=>$request->complementoCasa,
                'grauInstrucao'=>$request->grauInstrucao,
                'turno'=>$request->turno,
                'anoIngreso'=>$request->anoIngreso,     
                'anoCurso'=>$alunoAtualizado->anoCurso,
                //'id_salaAula'=>salaAula::where('curso',$request->curso)->where('serie',$request->anoCurso)->where('turno',$request->turno)->first(),
            ]);
            return redirect('/listarAlunos')->with('msg','Editado com sucesso!');
            
        }
        public function listarAlunos()
        {
            $busca=request('search'); 
            if($busca){
                if(!empty(User::where('matricula', 'like', '%'.$busca.'%')->first())){
                    $entidades=User::where([
                        ['matricula', 'like', '%'.$busca.'%']
                        ])->get();
                        foreach ($entidades as $aluno){
                            $alunos=address::where([['id_usuario_to_aluno','like',$aluno->id]])->get();
                        }
                }elseif(!empty(User::where('name', 'like', '%'.$busca.'%')->first())){
                        $entidades=User::where([
                            ['name', 'like', '%'.$busca.'%']
                            ])->get();
                            foreach ($entidades as $aluno){
                                $alunos=address::where([['id_usuario_to_aluno','like',$aluno->id]])->get();
                            }
                }else{
                    $entidades=null;
                    $alunos=null;
               }
            }else{
                $entidades=User::all();
                $alunos=address::all();
            }
            return view('ADM.aluno.listarAlunos',['entidades'=>$entidades,'alunos'=>$alunos,'busca'=>$busca]);
        }
        public function destruirAluno($id)
        {
            $aluno=address::findOrFail($id);
            if(empty($aluno)){
                return redirect('/listarAlunos')->with('errors','Esse aluno não existe!');
            }
            $entidade=user::findOrFail($aluno->id_usuario_to_aluno);
            $entidade->delete();
            return redirect('/listarAlunos')->with('errors','excluido com sucesso!');
        }
         //------------------------------Criar Professor------------------------------
         public function criarProfessor()
         {
             return view('ADM.professor.criarProfessor');
         }
         public function criarProfessorForms(Request $request)
         {
            //Criadno a entidade
             $novoUsuario = new User;
             $novoProfessor = new professor;
             $this->validate($request,[
                 'name'=>'required',
                 'nomeMae'=>'required',
                 'dataNascimento'=>'required',
                 'naturalidade'=>'required',
                 'etnia'=>'required',
                 'rg'=>'required',
                 'rgExpedicao'=>'required',
                 'ufExpeditor'=>'required',
                 'expeditorRg'=>'required',
                 'cpf'=>'required',
                 'email'=>'required',
                 'cep'=>'required',
                 'senha'=>'required',
                 'rua'=>'required',
                 'numeroCasa'=>'required',
                 'grauInstrucao'=>'required',
                 'modalidade'=>'required',
                 'profissao'=>'required',
             ],[
                 //'required' => ':attribute é um campo obrigartorio!', //idem
                 'name.required'=>'O campo Nome é obrigatorio',
                 'nomeMae.required'=>'O campo Nome da Mãe é obrigatorio',
                 'dataNascimento.required'=>'O campo Data de Nascimento é obrigatorio',
                 'naturalidade.required'=>'O campo Naturalidade é obrigatorio',
                 'etnia.required'=>'O campo Etina é obrigatorio',
                 'rg.required'=>'O campo RG é obrigatorio',
                 'rgExpedicao.required'=>'O campo Data de expedição do RG é obrigatorio',
                 'ufExpeditor.required'=>'O campo UF do Expeditor é obrigatorio',
                 'expeditorRg.required'=>'O campo Expeditor do RG é obrigatorio',
                 'cpf.required'=>'O campo CPF é obrigatorio',
                 'email.required'=>'O campo E-Mail é obrigatorio',
                 'anoIngreso.required'=>'O campo Ano de Ingresso é obrigatorio',
                 'numeroCasa.required'=>'O campo Número da casa é obrigatorio',
                 'turno.required'=>'O campo Turno é obrigatorio',
                 'grauInstrucao.required'=>'O campo Grau de Instrução é obrigatorio',
                 'modalidade.required'=>'O campo Modalidade é obrigatorio',
                 'profissao.required'=>'O campo Profissão é obrigatorio',
                 'senha.required'=>'O campo senha é obrigatorio',
             ]);
             //Passando os valores da web/request pro bd
             $novoUsuario->name = $request->name;
             $novoUsuario->email = $request->email;
             $novoUsuario->password =Hash::make($request->senha);
             $novoUsuario->matricula=rand(00000000, 99999999);
             $novoUsuario->save();
             //Adicionando os valores referente a tabela professor
             $novoProfessor->sexo=$request->sexo;
             $novoProfessor->estadoCivil=$request->estadoCivil;
             $novoProfessor->nomeMae=$request->nomeMae;
             $novoProfessor->TipoSanguineo=$request->TipoSanguineo;
             $novoProfessor->dataNascimento=$request->dataNascimento;
             $novoProfessor->naturalidade=$request->naturalidade;
             $novoProfessor->nomeUsual=$request->nomeUsual;
             $novoProfessor->etnia=$request->etnia;
             $novoProfessor->rg=$request->rg;
             $novoProfessor->rgExpedicao=$request->rgExpedicao;
             $novoProfessor->ufExpeditor=$request->ufExpeditor;
             $novoProfessor->expeditorRg=$request->expeditorRg;
             $novoProfessor->cpf=$request->cpf;
             $novoProfessor->numeroCelular=$request->numeroCelular;
             $novoProfessor->cep=$request->cep;
             $novoProfessor->UF=$request->UF;
             $novoProfessor->cidade=$request->cidade;
             $novoProfessor->bairro=$request->bairro;
             $novoProfessor->rua=$request->rua;
             $novoProfessor->numeroCasa=$request->numeroCasa;
             $novoProfessor->complementoCasa=$request->complementoCasa;
             $novoProfessor->grauInstrucao=$request->grauInstrucao;
             $novoProfessor->profissao=$request->profissao;
             $novoProfessor->modalidade=$request->modalidade;
             $novoProfessor->categoria='Professor';
             //Nível de acesso de professor é o acesso três
             $novoProfessor->nivelAcesso=3;
             //Upload de imagem
             if($request->hasFile('fotoProfessor') && $request->file('fotoProfessor')->isValid()){
                 //Pega a imagem
                 $requestImagem=$request->fotoProfessor;
                 //pega a extensão
                 $extension=$requestImagem->extension();
                 //cria o nome da imagem
                 $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now").".".$extension);
                 //move para a pasta das imagens
                 $requestImagem->move(public_path('img/professores'),$imagemName);
                 //salva no bd
                 $novoProfessor->fotoProfessor=$imagemName;
             }
             $novoProfessor->id_usuario_to_professors=$novoUsuario->id;
             $novoProfessor->save();
             //redirecionando a página
             return redirect('homeAdm')->with('msg','Professor cadastrado com sucesso!');
         }
         public function editarProfessor($id)
         {
             $professor=professor::findOrFail($id);
             if(empty($professor)){
                 return redirect('/listarProfessores')->with('msg','Esse Professor não existe!');
             }
             $entidade=User::findOrFail($professor->id_usuario_to_professors);
             return view('ADM.professor.editarProfessor',['professor'=>$professor, 'entidade'=>$entidade]);
         }
         public function editarProfessorForms(Request $request)
         {
             $professorAtualizado = new professor;
             $usuarioAtualizado = new User;
 
             $this->validate($request,[
                 'name'=>'required',
                 'nomeMae'=>'required',
                 'dataNascimento'=>'required',
                 'naturalidade'=>'required',
                 'etnia'=>'required',
                 'rg'=>'required',
                 'rgExpedicao'=>'required',
                 'ufExpeditor'=>'required',
                 'expeditorRg'=>'required',
                 'cpf'=>'required',
                 'email'=>'required',
                 'numeroCasa'=>'required'
                 ],[
                 //'required' => ':attribute é um campo obrigartorio!', //Idem do de cima
                 'name.required'=>'O campo Nome é obrigatorio',
                 'nomeMae.required'=>'O campo Nome da Mãe é obrigatorio',
                 'dataNascimento.required'=>'O campo Data de Nascimento é obrigatorio',
                 'naturalidade.required'=>'O campo Naturalidade é obrigatorio',
                 'etnia.required'=>'O campo Etina é obrigatorio',
                 'rg.required'=>'O campo RG é obrigatorio',
                 'rgExpedicao.required'=>'O campo Data de expedição do RG é obrigatorio',
                 'ufExpeditor.required'=>'O campo UF do Expeditor é obrigatorio',
                 'expeditorRg.required'=>'O campo Expeditor do RG é obrigatorio',
                 'cpf.required'=>'O campo CPF é obrigatorio',
                 'email.required'=>'O campo E-Mail é obrigatorio',
                 'numeroCasa.required'=>'O campo Número da casa é obrigatorio',
             ]);
             user::findOrFail($request->id)->update([
                 'name'=>$request->name,
                 'email'=>$request->email,
                 'matricula'=>$request->matricula,
             ]);
             //Upload de imagem
             if($request->hasfile('imagem') && $request->file('imagem')->isValid()){
                 $requestImagem=$request->imagem;
                 //Pega a imagem
                 $extension=$requestImagem->extension();
                 //pega a extensão
                 $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now").".".$extension);
                 //cria o nome da imagem
                 $request->imagem->move(public_path('img/professores'),$imagemName);
                 //salva no bd
                 $alunoAtualizado['imagem']=$imagemName;
             }
             professor::where('id_usuario_to_professors', 'like', '%'.$usuarioAtualizado->id.'%')->update([
                 'sexo'=>$request->sexo,
                 'estadoCivil'=>$request->estadoCivil,
                 'nomeMae'=>$request->nomeMae,
                 'TipoSanguineo'=>$request->TipoSanguineo,
                 'dataNascimento'=>$request->dataNascimento,
                 'naturalidade'=>$request->naturalidade,
                 'nomeUsual'=>$request->nomeUsual,  
                 'etnia'=>$request->etnia,                
                 'rg'=>$request->rg,
                 'rgExpedicao'=>$request->rgExpedicao,
                 'ufExpeditor'=>$request->ufExpeditor,
                 'expeditorRg'=>$request->expeditorRg,
                 'cpf'=>$request->cpf,
                 'numeroCelular'=>$request->numeroCelular,
                 'cep'=>$request->cep,
                 'UF'=>$request->UF,
                 'cidade'=>$request->cidade,
                 'bairro'=>$request->bairro,
                 'rua'=>$request->rua,
                 'numeroCasa'=>$request->numeroCasa,
                 'complementoCasa'=>$request->complementoCasa,
                 'grauInstrucao'=>$request->grauInstrucao,
                 'profissao'=>$request->profissao,
                 'modalidade'=>$request->modalidade,
                 'categoria'=>$request->categoria,
             ]);
             return redirect('/listarProfessores')->with('msg','Editado com sucesso!');
             
         }
         public function listarProfessores()
         {
             $busca=request('search'); 
             if($busca){
                 if(!empty(User::where('matricula', 'like', '%'.$busca.'%')->first())){
                     $entidades=User::where([
                         ['matricula', 'like', '%'.$busca.'%']
                         ])->get();
                         foreach ($entidades as $professors){
                             $professores=professor::where([['id_usuario_to_professors','like',$professors->id]])->get();
                         }
                 }elseif(!empty(User::where('name', 'like', '%'.$busca.'%')->first())){
                          $entidades=User::where([
                              ['name', 'like', '%'.$busca.'%']
                              ])->get();
                          foreach ($entidades as $professors){
                              $professores=professor::where([['id_usuario_to_professors','like',$professors->id]])->get();
                          }
                 }else{
                     $entidades=null;
                     $professores=null;
                 }
             }else{
                 $entidades=User::all();
                 $professores=professor::all();
             }
             return view('ADM.professor.listarProfessores',['entidades'=>$entidades,'professores'=>$professores,'busca'=>$busca]);
         }
         public function destruirProfessor($id)
         {
             $professor=professor::findOrFail($id);
             if(empty($professor)){
                 return redirect('/listarProfessores')->with('errors','Esse professor não existe!');
             }          
             $entidade=user::findOrFail($professor->id_usuario_to_professors);
             $entidade->delete();
             return redirect('/listarProfessores')->with('errors','excluido com sucesso!');
         }
       //------------------------------Biblioteca------------------------------
        public function acervoBiblioteca()
        {
            $busca=request('search'); 
            if($busca){
                if(!empty(Livros::where('titulo', 'like', '%'.$busca.'%')->first())){
                    $livro=Livros::where([
                        ['titulo', 'like', '%'.$busca.'%']
                        ])->get();
                }elseif(!empty(Livros::where('autor', 'like', '%'.$busca.'%')->first())){
                     $livro=Livros::where([
                             ['autor', 'like', '%'.$busca.'%']
                             ])->get();
                }else{
                    $livro=null;
                }
            }else{
                $livro=Livros::all();
            }
            return view('ADM.biblioteca.acervoBiblioteca',['livros'=>$livro,'busca'=>$busca]);
        }
        public function cadastrarLivro(Request $request)
        {            
            $novoLivro = new Livros;
            $this->validate($request,[
                'titulo'=>'required',
                'autor'=>'required',
                'edicao'=>'required',
                'volume'=>'required',
                'qtd_disponivel'=>'required',
            ],[
                'titulo.required'=>'O campo Titulo do livro é obrigatorio',
                'autor.required'=>'O campo Nome do Autor é obrigatorio',
                'edicao.required'=>'O campo referente a edição é obrigatorio',
                'volume.required'=>'O campo do Volume é obrigatorio',
                'qtd_disponivel.required'=>'O campo Quantidade disponível é obrigatorio',
            ]);
            $novoLivro->titulo=$request->titulo;
            $novoLivro->autor=$request->autor;
            $novoLivro->edicao=$request->edicao;
            $novoLivro->volume=$request->volume;
            $novoLivro->qtd_disponivel=$request->qtd_disponivel;
            //dd($request->all());
            $novoLivro->save();
            return redirect('/acervoBiblioteca')->with('msg','Livro criado!');
        }
        public function emprestimosBibliotecaToAluno()
        {
            $matricula=request('matricula');
            $livroEmprestimos=null;
            $alunoEmprestimo=null;
            $aluno=null;
            if($matricula){
                $aluno=User::where('matricula',$matricula)->first();
                if(!empty($aluno)){ 
                    $alunoEmprestimo=address::where('id_usuario_to_aluno','like',$aluno->id)->first();
                        if(!empty($alunoEmprestimo)){
                          $livroEmprestimos=$alunoEmprestimo->emprestimoAlunoLivro;
                        }
                }
            }
            return view('ADM.biblioteca.consultarEmprestimoMatricula',['entidade'=>$aluno,'alunos'=>$alunoEmprestimo,'emprestimoLivro'=>$livroEmprestimos]);
        }
        public function destruirEmprestimo($id){
            $alunoRemover=address::findOrFail($id[14]);
            $alunoRemover->emprestimoAlunoLivro()->detach($id[28]);           
            return redirect('/acervoBiblioteca-consultar-Emprestimos');
        }
        public function destruirLivro($id)
        {
            $livro=Livros::findOrFail($id);
            if(empty($livro)){
                return redirect('/acervoBiblioteca')->with('errors','Esse livro não existe!');
            }
            $livro->delete();
            return redirect('/acervoBiblioteca')->with('errors','excluido com sucesso!');
        }
        //-------------------------------------------Sala de aula------------------------
        public function listarTurmas()
        {   
            $busca=request('search');
            if($busca){
                if(!empty(salaAula::where('curso', 'like', '%'.$busca.'%')->first())){
                    $salaDeAula=salaAula::where([
                        ['curso', 'like', '%'.$busca.'%'],
                        ])->get();
                }elseif(!empty(salaAula::where('serie', 'like', '%'.$busca.'%')->first())){
                    $salaDeAula=salaAula::where([
                        ['serie', 'like', '%'.$busca.'%'],
                        ])->get();
                }else{
                     $salaDeAula=salaAula::where([
                         ['turno', 'like', '%'.$busca.'%'],
                         ])->get();        
                }
            }else{
                $salaDeAula=salaAula::all();
            }
            return view('ADM.salaAula.listarSalaAula',['salaDeAula'=>$salaDeAula,'busca'=>$busca]);
        }
        public function editarTurma($id)
        {   
            $professores=professor::all('id','id_usuario_to_professors');
            $turma=salaAula::findOrFail($id);
            if(empty($turma)){
                return redirect('/dashboard')->with('msg','Turma não existe');
            }else{
                $turma=salaAula::findOrFail($id);
                if(empty($turma)){
                    return redirect('/dashboard')->with('msg','Turma não existe');
                }else{ 
                    //Aulas da segunda
                    $salaAluno=salaAula::where('id',$id)->first();
                    $materiaCadastradas=materia::all('id','nomeMateria','id_professor');
                    $professores=null;
                    $entidade=null;
                    if(!empty($materiaCadastradas))
                    {
                         foreach ($materiaCadastradas as $materias){
                            $professores=professor::where([
                                ['id', 'like', '%'.$materias->id_professor.'%'],
                                ])->get();
                            $entidade=user::all('id','name');
                        }
                     }else{
                         $entidade=null;
                     }
                    if(!empty($salaAluno)){
                        $segundaAulaUm=materia::where('id',$salaAluno->segundaUm)->first();
                        if(!empty($segundaAulaUm)){
                            $procurarProfessor=professor::where('id',$segundaAulaUm->id_professor)->first();
                            $professorSegundaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                       }else{
                            $professorSegundaUm=null;
                       }
                       $segundaAulaDois=materia::where('id',$salaAluno->segundaDois)->first();
                       if(!empty($segundaAulaDois)){
                                $procurarProfessor=professor::where('id',$segundaAulaDois->id_professor)->first();
                                $professorSegundaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                               $professorSegundaDois=null;
                           }
                           $segundaAulaTres=materia::where('id',$salaAluno->segundaTres)->first();
                           if(!empty($segundaAulaTres)){
                                $procurarProfessor=professor::where('id',$segundaAulaTres->id_professor)->first();
                                $professorSegundaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                               $professorSegundaTres=null;
                           }
                           $segundaAulaQuatro=materia::where('id',$salaAluno->segundaQuatro)->first();
                           if(!empty($segundaAulaQuatro)){
                                $procurarProfessor=professor::where('id',$segundaAulaQuatro->id_professor)->first();
                                $professorSegundaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                               $professorSegundaQuatro=null;
                           }
                           $segundaAulaCinco=materia::where('id',$salaAluno->segundaCinco)->first();
                           if(!empty($segundaAulaCinco)){
                                $procurarProfessor=professor::where('id',$segundaAulaCinco->id_professor)->first();
                                $professorSegundaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                               $professorSegundaCinco=null;
                           }
                           $segundaAulaSeis=materia::where('id',$salaAluno->segundaSeis)->first();
                           if(!empty($segundaAulaSeis)){
                                $procurarProfessor=professor::where('id',$segundaAulaSeis->id_professor)->first();
                                $professorSegundaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                               $professorSegundaSeis=null;
                           }
                           //Aulas da terca
                           $tercaAulaUm=materia::where('id',$salaAluno->tercaUm)->first();
                           if(!empty($tercaAulaUm)){
                                $procurarProfessor=professor::where('id',$tercaAulaUm->id_professor)->first();
                                $professorTercaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorTercaUm=null;
                           }
                           $tercaAulaDois=materia::where('id',$salaAluno->tercaDois)->first();
                           if(!empty($tercaAulaDois)){
                                $procurarProfessor=professor::where('id',$tercaAulaDois->id_professor)->first();
                                $professorTercaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorTercaDois=null;
                           }
                           $tercaAulaTres=materia::where('id',$salaAluno->tercaTres)->first();
                           if(!empty($tercaAulaTres)){
                                $procurarProfessor=professor::where('id',$tercaAulaTres->id_professor)->first();
                                $professorTercaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorTercaTres=null;
                           }
                           $tercaAulaQuatro=materia::where('id',$salaAluno->tercaQuatro)->first();
                           if(!empty($tercaAulaQuatro)){
                                $procurarProfessor=professor::where('id',$tercaAulaQuatro->id_professor)->first();
                                $professorTercaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorTercaQuatro=null;
                           }
                           $tercaAulaCinco=materia::where('id',$salaAluno->tercaCinco)->first();
                           if(!empty($tercaAulaCinco)){
                                $procurarProfessor=professor::where('id',$tercaAulaCinco->id_professor)->first();
                                $professorTercaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorTercaCinco=null;
                           }
                           $tercaAulaSeis=materia::where('id',$salaAluno->tercaSeis)->first();
                           if(!empty($tercaAulaSeis)){
                                $procurarProfessor=professor::where('id',$tercaAulaSeis->id_professor)->first();
                                $professorTercaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorTercaSeis=null;
                           }
                           //Aulas da quarta
                           $quartaAulaUm=materia::where('id',$salaAluno->quartaUm)->first();
                           if(!empty($quartaAulaUm)){
                                $procurarProfessor=professor::where('id',$quartaAulaUm->id_professor)->first();
                                $professorQuartaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuartaUm=null;
                           }
                           $quartaAulaDois=materia::where('id',$salaAluno->quartaDois)->first();
                           if(!empty($quartaAulaDois)){
                                $procurarProfessor=professor::where('id',$quartaAulaDois->id_professor)->first();
                                $professorQuartaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuartaDois=null;
                           }
                           $quartaAulaTres=materia::where('id',$salaAluno->quartaTres)->first();
                           if(!empty($quartaAulaTres)){
                                $procurarProfessor=professor::where('id',$quartaAulaTres->id_professor)->first();
                                $professorQuartaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuartaTres=null;
                           }
                           $quartaAulaQuatro=materia::where('id',$salaAluno->quartaQuatro)->first();
                           if(!empty($quartaAulaQuatro)){
                                $procurarProfessor=professor::where('id',$quartaAulaQuatro->id_professor)->first();
                                $professorQuartaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuartaQuatro=null;
                           }
                           $quartaAulaCinco=materia::where('id',$salaAluno->quartaCinco)->first();
                           if(!empty($quartaAulaCinco)){
                                $procurarProfessor=professor::where('id',$quartaAulaCinco->id_professor)->first();
                                $professorQuartaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuartaCinco=null;
                           }
                           $quartaAulaSeis=materia::where('id',$salaAluno->quartaSeis)->first();
                           if(!empty($quartaAulaSeis)){
                                $procurarProfessor=professor::where('id',$quartaAulaSeis->id_professor)->first();
                                $professorQuartaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuartaSeis=null;
                           }
                       //Aulas da quinta
                       $quintaAulaUm=materia::where('id',$salaAluno->quintaUm)->first();
                           if(!empty($quintaAulaUm)){
                                $procurarProfessor=professor::where('id',$quintaAulaUm->id_professor)->first();
                                $professorQuintaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuintaUm=null;
                           }
                           $quintaAulaDois=materia::where('id',$salaAluno->quintaDois)->first();
                           if(!empty($quintaAulaDois)){
                                $procurarProfessor=professor::where('id',$quintaAulaDois->id_professor)->first();
                                $professorQuintaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuintaDois=null;
                           }
                           $quintaAulaTres=materia::where('id',$salaAluno->quintaTres)->first();
                           if(!empty($quintaAulaTres)){
                                $procurarProfessor=professor::where('id',$quintaAulaTres->id_professor)->first();
                                $professorQuintaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuintaTres=null;
                           }
                           $quintaAulaQuatro=materia::where('id',$salaAluno->quintaQuatro)->first();
                           if(!empty($quintaAulaQuatro)){
                                $procurarProfessor=professor::where('id',$quintaAulaQuatro->id_professor)->first();
                                $professorQuintaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuintaQuatro=null;
                           }
                           $quintaAulaCinco=materia::where('id',$salaAluno->quintaCinco)->first();
                           if(!empty($quintaAulaCinco)){
                                $procurarProfessor=professor::where('id',$quintaAulaCinco->id_professor)->first();
                                $professorQuintaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuintaCinco=null;
                           }
                           $quintaAulaSeis=materia::where('id',$salaAluno->quintaSeis)->first();
                           if(!empty($quintaAulaSeis)){
                                $procurarProfessor=professor::where('id',$quintaAulaSeis->id_professor)->first();
                                $professorQuintaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorQuintaSeis=null;
                           }
                       //Aulas da Sexta
                       $sextaAulaUm=materia::where('id',$salaAluno->sextaUm)->first();
                           if(!empty($sextaAulaUm)){
                                $procurarProfessor=professor::where('id',$sextaAulaUm->id_professor)->first();
                                $professorSextaUm=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorSextaUm=null;
                           }
                           $sextaAulaDois=materia::where('id',$salaAluno->sextaDois)->first();
                           if(!empty($sextaAulaDois)){
                                $procurarProfessor=professor::where('id',$sextaAulaDois->id_professor)->first();
                                $professorSextaDois=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorSextaDois=null;
                           }
                           $sextaAulaTres=materia::where('id',$salaAluno->sextaTres)->first();
                           if(!empty($sextaAulaTres)){
                                $procurarProfessor=professor::where('id',$sextaAulaTres->id_professor)->first();
                                $professorSextaTres=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorSextaTres=null;
                           }
                           $sextaAulaQuatro=materia::where('id',$salaAluno->sextaQuatro)->first();
                           if(!empty($sextaAulaQuatro)){
                                $procurarProfessor=professor::where('id',$sextaAulaQuatro->id_professor)->first();
                                $professorSextaQuatro=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorSextaQuatro=null;
                           }
                           $sextaAulaCinco=materia::where('id',$salaAluno->sextaCinco)->first();
                           if(!empty($sextaAulaCinco)){
                                $procurarProfessor=professor::where('id',$sextaAulaCinco->id_professor)->first();
                                $professorSextaCinco=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorSextaCinco=null;
                           }
                           $sextaAulaSeis=materia::where('id',$salaAluno->sextaSeis)->first();
                           if(!empty($sextaAulaSeis)){
                                $procurarProfessor=professor::where('id',$sextaAulaSeis->id_professor)->first();
                                $professorSextaSeis=User::where('id',$procurarProfessor->id_usuario_to_professors)->first();
                           }else{
                                $professorSextaSeis=null;
                           }
                    }
                    return view('ADM.salaAula.editarSala',['turma'=>$turma,'sala'=>$salaAluno,'materiaCadastradas'=>$materiaCadastradas,'professores'=>$professores ,'entidade'=>$entidade,
                                  //Aulas e professores da Segunda
                                   'aulaUmSegunda'=>$segundaAulaUm,
                                   'professorUmSegunda'=>$professorSegundaUm,
                                   'aulaDoisSegunda'=>$segundaAulaDois,
                                   'professorDoisSegunda'=>$professorSegundaDois,
                                   'aulaTresSegunda'=>$segundaAulaTres,
                                   'professorTresSegunda'=>$professorSegundaTres,
                                   'aulaQuatroSegunda'=>$segundaAulaQuatro,
                                   'professorQuatroSegunda'=>$professorSegundaQuatro,
                                   'aulaCincoSegunda'=>$segundaAulaCinco,
                                   'professorCincoSegunda'=>$professorSegundaCinco,
                                   'aulaSeisSegunda'=>$segundaAulaSeis,
                                   'professorSeisSegunda'=>$professorSegundaSeis,
                                   //Aulas e professores da Terça
                                   'aulaUmTerca'=>$tercaAulaUm,
                                   'professorUmTerca'=>$professorTercaUm,
                                   'aulaDoisTerca'=>$tercaAulaDois,
                                   'professorDoisTerca'=>$professorTercaDois,
                                   'aulaTresTerca'=>$tercaAulaTres,
                                   'professorTresTerca'=>$professorTercaTres,
                                   'aulaQuatroTerca'=>$tercaAulaQuatro,
                                   'professorQuatroTerca'=>$professorTercaQuatro,
                                   'aulaCincoTerca'=>$tercaAulaCinco,
                                   'professorCincoTerca'=>$professorTercaCinco,
                                   'aulaSeisTerca'=>$tercaAulaSeis,
                                   'professorSeisTerca'=>$professorTercaSeis,
                                   //Aulas e professores da Quarta
                                   'aulaUmQuarta'=>$quartaAulaUm,
                                   'professorUmQuarta'=>$professorQuartaUm,
                                   'aulaDoisQuarta'=>$quartaAulaDois,
                                   'professorDoisQuarta'=>$professorQuartaDois,
                                   'aulaTresQuarta'=>$quartaAulaTres,
                                   'professorTresQuarta'=>$professorQuartaTres,
                                   'aulaQuatroQuarta'=>$quartaAulaQuatro,
                                   'professorQuatroQuarta'=>$professorQuartaQuatro,
                                   'aulaCincoQuarta'=>$quartaAulaCinco,
                                   'professorCincoQuarta'=>$professorQuartaCinco,
                                   'aulaSeisQuarta'=>$quartaAulaSeis,
                                   'professorSeisQuarta'=>$professorQuartaSeis,
                                   //Aulas e professores da Quinta
                                   'aulaUmQuinta'=>$quintaAulaUm,
                                   'professorUmQuinta'=>$professorQuintaUm,
                                   'aulaDoisQuinta'=>$quintaAulaDois,
                                   'professorDoisQuinta'=>$professorQuintaDois,
                                   'aulaTresQuinta'=>$quintaAulaTres,
                                   'professorTresQuinta'=>$professorQuintaTres,
                                   'aulaQuatroQuinta'=>$quintaAulaQuatro,
                                   'professorQuatroQuinta'=>$professorQuintaQuatro,
                                   'aulaCincoQuinta'=>$quintaAulaCinco,
                                   'professorCincoQuinta'=>$professorQuintaCinco,
                                   'aulaSeisQuinta'=>$quintaAulaSeis,
                                   'professorSeisQuinta'=>$professorQuintaSeis,
                                   //Aulas e professores da Sexta
                                   'aulaUmSexta'=>$sextaAulaUm,
                                   'professorUmSexta'=>$professorSextaUm,
                                   'aulaDoisSexta'=>$sextaAulaDois,
                                   'professorDoisSexta'=>$professorSextaDois,
                                   'aulaTresSexta'=>$sextaAulaTres,
                                   'professorTresSexta'=>$professorSextaTres,
                                   'aulaQuatroSexta'=>$sextaAulaQuatro,
                                   'professorQuatroSexta'=>$professorSextaQuatro,
                                   'aulaCincoSexta'=>$sextaAulaCinco,
                                   'professorCincoSexta'=>$professorSextaCinco,
                                   'aulaSeisSexta'=>$sextaAulaSeis,
                                   'professorSeisSexta'=>$professorSextaSeis,
                    ]);
                }    
            }
        }
        public function editarTurma_ListarAlunos($id)
        {
            $busca=request('search'); 
            if($busca){
                if(!empty(User::where('matricula', 'like', '%'.$busca.'%')->first())){
                    $entidades=User::where([
                        ['matricula', 'like', '%'.$busca.'%']
                        ])->get();
                        foreach ($entidades as $aluno){
                            $alunos=address::where([['id_usuario_to_aluno','like',$aluno->id]])->get();
                        }
                }elseif(!empty(User::where('name', 'like', '%'.$busca.'%')->first())){
                        $entidades=User::where([
                            ['name', 'like', '%'.$busca.'%']
                            ])->get();
                            foreach ($entidades as $aluno){
                                $alunos=address::where([['id_usuario_to_aluno','like',$aluno->id]])->get();
                            }
                }
            }else{
                $entidades=null;
                 $alunos=address::where([['id_salaAula','like',$id]])->get();
                 foreach ($alunos as $aluno){
                     $entidades=user::where([
                     ['id', 'like', $aluno->id_usuario_to_aluno]
                     ])->get();
                    }
                }
            return view('ADM.aluno.listarAlunos',['entidades'=>$entidades,'alunos'=>$alunos,'busca'=>$busca]);
        }
        public function criarMateria()
        {
            $professores=professor::all('id','id_usuario_to_professors');
            if(!empty($professores))
            {
                 foreach ($professores as $professor){
                     $entidade=user::all('id','name');
                 }
             }else{
                 $entidade=null;
             }
            return view('ADM.salaAula.criarMateria',['professores'=>$professores,'entidade'=>$entidade]);
        }
        public function criarMateriaForms(Request $request)
        {
           $materiaNova=new materia;
           $this->validate($request,[
            'id_professor'=>'required',
            'nomeMateria'=>'required'
            ],[
                'id_professor.required'=>'O campo Professor é obrigatorio',
                'nomeMateria.required'=>'O campo materia é obrigatorio',
                
            ]);
           $materiaNova->id_professor=$request->id_professor;
           $materiaNova->nomeMateria=$request->nomeMateria;
           $materiaNova->save();
            //redirecionando a página
            return redirect('homeAdm')->with('msg','Materia cadastrada com sucesso!');
    
        }
        public function materiaToHorario(Request $request)
        {
            $id=$request->id;
            $dadosAluno=new dados__aula__por__aluno;
            $this->validate($request,[
                'materiaAula'=>'required',
                'horarioAula'=>'required',
                ],[
                'materiaAula.required'=>'O campo Materia é obrigatorio',
                'horarioAula.required'=>'O campo horario é obrigatorio',
                ]);
            $materia=$request->materiaAula;
            salaAula::findOrFail($id)->update([
                 $request->horarioAula=>$materia,
            ]);
            $alunos=address::all();
            foreach ($alunos as $aluno)
            {
                if(empty(dados__aula__por__aluno::where('id_aluno',$aluno->id)->orWhere('id_materia',$materia)->first()))
                {
                     $dadosAluno->id_aluno=$aluno->id;
                     $dadosAluno->id_materia=$materia;
                     $dadosAluno->situacao=0;
                     $dadosAluno->qtd_falta_geral=0;
                     $dadosAluno->qtd_falta_Um=0;
                     $dadosAluno->qtd_falta_Dois=0;
                     $dadosAluno->qtd_falta_Tres=0;
                     $dadosAluno->qtd_falta_Quatro=0;
                     $dadosAluno->notaUm=0;
                     $dadosAluno->notaDois=0;
                     $dadosAluno->notaTres=0;
                     $dadosAluno->notaQuatro=0;
                     $dadosAluno->situacao=1;
                     $dadosAluno->save();
                }
            }
            return redirect('/dadosTurma/'.$id);
        }
}