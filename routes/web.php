<?php

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

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/home', 'Home@index');

Route::post('usuarios/logar', 'Usuarios@logar');
Route::post('usuarios/cadastrar', 'Usuarios@cadastrar');

Route::post('turmas/salvar', 'Turmas@salvar');
Route::get('turmas/listar', 'Turmas@listar');