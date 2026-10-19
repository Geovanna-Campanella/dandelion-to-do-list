<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\tarefaController;
use App\Http\Controllers\usuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//USUARIO
//LOGIN E LOGOUT
Route::post('/fazerLogin', 'App\Http\Controllers\usuarioController@fazerLogin');
Route::post('/fazerLogout', 'App\Http\Controllers\usuarioController@fazerLogout')->middleware('auth');
Route::get('/mostrarUsuario', 'App\Http\Controllers\usuarioController@mostrarUsuario')->middleware('auth');


Route::post('/cadastrarUsuario','App\Http\Controllers\usuarioController@store');

Route::put('/atualizarUsuario','App\Http\Controllers\usuarioController@update')->middleware('auth');

//TAREFAS
Route::get('/exibirTarefas','App\Http\Controllers\TarefaController@index')->middleware('auth');

Route::post('/cadastrarTarefa','App\Http\Controllers\TarefaController@store')->middleware('auth');


Route::get('/tarefas/{id}/editar','App\Http\Controllers\TarefaController@edit')->middleware('auth');

Route::put('/editarTarefa/{id}','App\Http\Controllers\TarefaController@update')->middleware('auth');

Route::delete('/excluirTarefa/{id}','App\Http\Controllers\TarefaController@destroy')->middleware('auth');


//TELAS
Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', function () {
    return view('nivelCadastro.cadastro');
});

Route::get('/perfilUsuario', function () {
    return view('nivelUsuario.usuario', [
        'usuario' => auth()->user()
    ]);
})->middleware('auth');

Route::get('/perfilUsuario/editar', function () {
    return view('nivelUsuario.editarPerfilUsuario', [
        'usuario' => auth()->user()
    ]);
})->middleware('auth');

Route::get('/dashboard', function () {
    $usuario = auth()->user();

    $tarefas = \App\Models\tarefaModel::where(
        'usuario_id',
        $usuario->id
    )->get();

    return view('nivelDashboard.dashboard', compact('usuario', 'tarefas'));

})->middleware('auth');

Route::get('/tarefa', function () {
    return view('nivelTarefa.tarefa', [
        'usuario' => auth()->user()
    ]);
})->middleware('auth');

