<?php

Auth::routes();

Route::redirect('/', '/home');
//Route::view('/home', 'home')->name('home');
Route::resource('/home', 'Post\PostController');

/* ---------------------------------------- AJAX ---------------------------------------- */
Route::post('/ajax_cidades', 'Endereco\AjaxController@getCidades');
Route::post('/ajax_estado_cidade', 'Endereco\AjaxController@getEstadoCidade');

Route::post('/ajax/user/removeRole', 'User\AjaxController@removeRole');
Route::post('/ajax/user/removePermission', 'User\AjaxController@removePermission');
Route::post('/ajax/user/addPermission', 'User\AjaxController@addPermission');
Route::post('/ajax/user/addRole', 'User\AjaxController@addRole');

Route::post('/ajax/projetos/setVisibilidade', 'Projeto\AjaxController@changeVisibilidade');

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

Route::resource('user', 'User\UserController', [
    'only' => ['edit', 'update']
]);

// Só pra usar url no plural
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

Route::get('/editor/noticias', 'Admin\AdminController@showNoticias')->name('dashboard_noticias');

Route::patch('/admin/ledes', 'Admin\AdminController@updateLedes')->name('atualizar_ledes');
