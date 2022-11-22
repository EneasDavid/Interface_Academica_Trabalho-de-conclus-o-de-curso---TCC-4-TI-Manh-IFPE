<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ADMController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\Geral;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//geral
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
})->middleware('auth')->name('logout');

Route::get('/esqueceuSenha', [Geral::class, 'indexSenha']);
Route::POST('/esqueceuSenha-Forms-email', [Geral::class, 'esqueceuSenhaFormsEmail'])->name('recSenhaToEmail');
Route::post('/esqueceuSenha-Forms', [Geral::class, 'esqueceuSenhaForms'])->name('recSenhaEntidade');
//Rotas da entidade ADM
//******LOGIN********/
Route::get('/loginAdm', [ADMController::class, 'indexADM'])->name('home.ADMlogin');
Route::post('/Forms-Login-ADM',[ADMController::class, 'loginADM'])->name('ADM.login');

/*******AfterLogin********/
Route::get('/homeAdm', [ADMController::class, 'homeADM'])->middleware('auth');
//===============================Aluno============================================
//Criar aluno
Route::get('/criarAluno', [ADMController::class, 'criarAluno'])->middleware('auth');
Route::post('/Forms-Aluno-Criar',[ADMController::class, 'criarAlunoForms'])->name('ADM.criarAluno')->middleware('auth');
//Editar aluno
Route::get('/editarAluno/{id}', [ADMController::class, 'editarAluno'])->middleware('auth');
Route::post('/Forms-Aluno-Editar/{id}',[ADMController::class, 'editarAlunoForms'])->name('ADM.editarAluno')->middleware('auth');
//Listar
Route::get('/listarAlunos', [ADMController::class, 'listarAlunos'])->name('ADM.listarAlunos')->middleware('auth');
//Excluir
Route::delete('/destruirAluno/{id}',[ADMController::class, 'destruirAluno'])->name('destruirAluno');

//===============================Professor=========================================
//Criar professor
Route::get('/criarProfessor', [ADMController::class, 'criarProfessor'])->middleware('auth');
Route::post('/Forms-Professor-Criar',[ADMController::class, 'criarProfessorForms'])->name('ADM.criarProfessor')->middleware('auth');
//Editar professor
Route::get('/editarProfessor/{id}', [ADMController::class, 'editarProfessor'])->middleware('auth');
Route::post('/Forms-Professor-Editar/{id}',[ADMController::class, 'editarProfessorForms'])->name('ADM.editarProfessor')->middleware('auth');
//Listar
Route::get('/listarProfessores', [ADMController::class, 'listarProfessores'])->name('ADM.listarProfessores')->middleware('auth');
//Excluir
Route::delete('/destruirProfessor/{id}',[ADMController::class, 'destruirProfessor'])->name('destruirProfessor');

//===============================Horario=========================================
//Criar horario
Route::get('/criarHorario', [ADMController::class, 'criarHorario'])->middleware('auth');
Route::post('/Forms-Horario-Criar',[ADMController::class, 'criarHorarioForms'])->name('ADM.criarHorario')->middleware('auth');
//Listar
Route::get('/editarTurma', [ADMController::class, 'listarTurmas'])->name('ADM.listarTurmas')->middleware('auth');
//===============================Livro=========================================
//Livro
//Listar
Route::get('/acervoBiblioteca', [ADMController::class, 'acervoBiblioteca'])->name('ADM.acervoBiblioteca')->middleware('auth');
//Cadastrar
Route::post('/Forms-Livro-Criar',[ADMController::class, 'cadastrarLivro'])->name('ADM.cadastrarLivro')->middleware('auth');
//Excluir
Route::delete('/destruirLivro/{id}',[ADMController::class, 'destruirLivro'])->name('destruirLivro');
//Emprestimo
Route::get('/acervoBiblioteca-Emprestimos', [ADMController::class, 'emprestimosBiblioteca'])->name('ADM.acervoBiblioteca')->middleware('auth');

//===============================Turma=========================================
//Turma
Route::get('/dadosTurma/{id}',[ADMController::class, 'editarTurma'])->middleware('auth');
Route::get('/dadosTurma/listarAlunos/{id}',[ADMController::class, 'editarTurma_ListarAlunos'])->middleware('auth');
Route::get('/dadosTurma/listarProfessores/{id}',[ADMController::class, 'editarTurma_ListarProfessores'])->middleware('auth');
Route::get('/criarMateria',[ADMController::class, 'criarMateria'])->middleware('auth');
//=========================================================================================================================//
//Rotas da entidade Aluno
//******LOGIN********/
Route::get('/', [AlunoController::class, 'indexAluno'])->name('home.Alunologin');
Route::post('/Forms-Login-Aluno',[AlunoController::class, 'loginAluno'])->name('Aluno.login');
/*******AfterLogin********/
Route::get('/homeAluno', [AlunoController::class, 'homeAluno'])->middleware('auth');
Route::get('/calendarioAcademico', [AlunoController::class, 'calendarioA'])->middleware('auth');
Route::get('/acervoBibliotecaToAluno', [AlunoController::class, 'acervoBiblioteca'])->middleware('auth');
Route::get('/alterarSenhaToAluno', [AlunoController::class, 'alterarSenha'])->middleware('auth');
Route::post('/emprestimoLivro/{id}',[AlunoController::class, 'emrpestimo'])->middleware('auth');
//Rotas da entidade Aluno

//******LOGIN********/
Route::get('/loginProfessor', [ProfessorController::class, 'indexProfessor'])->name('home.Professorlogin');
Route::post('/Forms-Login-Professor',[ProfessorController::class, 'loginProfessor'])->name('Professor.login');
/*******AfterLogin********/
Route::get('/homeProfessor', [ProfessorController::class, 'homeProfessor'])->middleware('auth');
Route::get('/TurmaMateria', [ProfessorController::class, 'TurmaMateria'])->middleware('auth');
//Rotas da entidade Professor