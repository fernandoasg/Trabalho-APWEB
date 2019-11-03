<?php

Auth::routes();

Route::redirect('/', '/home');
Route::view('/home', 'home')->name('home');

/* ---------------------------------------- AJAX ---------------------------------------- */
Route::post('/ajax_cidades','Endereco\AjaxController@getCidades');
Route::post('/ajax_estado_cidade','Endereco\AjaxController@getEstadoCidade');

/*
 *  | Index de resource               | GET|HEAD      | resource                    | resource.index    | App\Http\Controllers\resource\resourceController@index     | web                                             |
 *  | Armazena resource               | POST          | resource                    | resource.store    | App\Http\Controllers\resource\resourceController@store     | web                                             |
 *  | Cria resource                   | GET|HEAD      | resource/create             | resource.create   | App\Http\Controllers\resource\resourceController@create    | web                                             |
 *  | Exibe resource                  | GET|HEAD      | resource/{resource}         | resource.show     | App\Http\Controllers\resource\resourceController@show      | web                                             |
 *  | Atualiza resource               | PUT|PATCH     | resource/{resource}         | resource.update   | App\Http\Controllers\resource\resourceController@update    | web                                             |
 *  | Deleta resource                 | DELETE        | resource/{resource}         | resource.destroy  | App\Http\Controllers\resource\resourceController@destroy   | web                                             |
 *  | Mostra formulario de alteracao  | GET|HEAD      | resource/{resource}/edit    | resource.edit     | App\Http\Controllers\resource\resourceController@edit      | web                                             |
 */
Route::resource('projeto', 'Projeto\ProjetoController');

//Só pra usar url no plural
Route::get('/projetos', 'Projeto\ProjetoController@index');

Route::resource('profile', 'Profile\ProfileController', [
    'except' => ['create', 'store']
]);

Route::resource('post', 'Post\PostController', ['except' => 'index']);

/* ---------------------------------------- ABOUT ---------------------------------------- */
Route::view('/sobre', 'sobre')->name('sobre');
Route::get('/contato', 'Contato\ContatoController@index');

/* ---------------------------------------- ADMIN E EDITOR ---------------------------------------- */
Route::get('/admin', 'Admin\AdminController@index')->name('admin_area');

Route::get('/admin/ledes', 'Admin\AdminController@showLedes')->name('dashboard_ledes');


Route::get('/admin/usuarios', 'Admin\AdminController@showUsers')->name('dashboard_users');


Route::get('/admin/projetos', 'Admin\AdminController@showProjetos')->name('dashboard_projetos');
Route::get('project_create', ['uses' => 'Admin\AdminController@createProjeto']);
Route::post('/salvar_projeto', 'Admin\AdminController@salvarProjeto');

Route::get('/editor/noticias', 'Admin\AdminController@showNoticias')->name('dashboard_noticias');

//alterar nome
Route::patch('/admin/ledes', 'Admin\AdminController@updateLedes')->name('atualizar_ledes');

//ver essa merda
Route::post('/contato', 'Contato\ContatoController@sendContactRequest')->name('enviar_contato');
