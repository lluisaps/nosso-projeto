<?php

use Illuminate\Support\Facades\Route;

//Rotas de Site
Route::get('/',
        ['uses'=>'App\Http\Controllers\Site\SiteController@index']);

Route::get('/home', 
        ['as' =>'site.home',
        'uses'=>'App\Http\Controllers\Site\SiteController@index']);

Route::get('/sobre',
        ['as' =>'site.sobre',
        'uses'=>'App\Http\Controllers\Site\SiteController@sobre']);

Route::group(['middleware' => 'auth'],function() {
    Route::get('/perfil',
        ['as' =>'site.perfil',
        'uses'=>'App\Http\Controllers\Site\SiteController@perfil']);

    Route::post('/perfil/atualizar_foto', 
        ['as'=> 'site.atualizarFoto',
        'uses'=> 'App\Http\Controllers\Site\SiteController@atualizarFoto']);

    Route::get('/avaliacao',
        ['as'=> 'site.avaliacao',
        'uses'=> 'App\Http\Controllers\Site\SiteController@avaliacao']);

    Route::get('/doc',
        ['as' => 'site.doc',
        'uses'=> 'App\Http\Controllers\Site\SiteController@doc']);

    //rotas de admin

    Route::get('/admin/usuarios',
        ['as' => 'admin.usuarios.index',
        'uses'=> 'App\Http\Controllers\Admin\UsuarioController@index']);

     Route::get('/admin/usuarios/adicionar',
         ['as' =>'admin.usuarios.adicionar',
         'uses'=>'App\Http\Controllers\Admin\UsuarioController@adicionar']);

    Route::post('/admin/usuarios/salvar',
        ['as' =>'admin.usuarios.salvar',
        'uses'=>'App\Http\Controllers\Admin\UsuarioController@salvar']);

    Route::get('/admin/usuarios/editar/{id}',
        ['as' =>'admin.usuarios.editar',
        'uses'=>'App\Http\Controllers\Admin\UsuarioController@editar']);

    Route::put('/admin/usuarios/atualizar/{id}',
        ['as' =>'admin.usuarios.atualizar',
        'uses'=>'App\Http\Controllers\Admin\UsuarioController@atualizar']);

    Route::get('/admin/usuarios/excluir/{id}',
        ['as' =>'admin.usuarios.excluir',
        'uses'=>'App\Http\Controllers\Admin\UsuarioController@excluir']);
});

//Rotas de Login
Route::get('/login',
    ['as' =>'site.login',
    'uses'=>'App\Http\Controllers\Site\LoginController@index']);

Route::post('/login/entrar',
    ['as'=>'login.entrar',
    'uses'=>'App\Http\Controllers\Site\LoginController@entrar']);

Route::get('/login/sair',
    ['as'=>'login.sair',
    'uses'=>'App\Http\Controllers\Site\LoginController@sair']);

//Rotas de Registro
Route::post('/login/registrar',
    ['as'=>'login.registrar',
    'uses'=>'App\Http\Controllers\Site\LoginController@registrar']);