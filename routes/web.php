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
Auth::routes();

Route::redirect('/', '/home');
Route::view('/home', 'home')->name('home');

// Rota reservada para ajax, retorna as cidades de acordo com o estado enviado
Route::post('/ajax_cidades','Endereco\AjaxController@getCidades');
Route::post('/ajax_estado_cidade','Endereco\AjaxController@getEstadoCidade');


// Rotas do ProjetosController
Route::get('/projetos', 'ProjetosController@index');
Route::get('/projeto/{nomeProjeto}', 'ProjetosController@mostra');
Route::get('/projetos/siai', 'ProjetosController@siai');
Route::get('/projetos/ledes', 'ProjetosController@ledes');


// Rotas do NoticiasController
Route::get('/noticias', 'NoticiasController@index');
Route::get('/noticia/{idNoticia}', 'NoticiasController@mostra');


// Rotas do SobreController
Route::get('/sobre', 'SobreController@index');
Route::get('/contato', 'SobreController@contato');

/*
 *  | Mostrar perfil usuário logado        | GET|HEAD                               | profile                    | profile.index    | App\Http\Controllers\Profile\ProfileController@index                   | web                                             |
 *  | Armazena perfil do usuário           | POST                                   | profile                    | profile.store    | App\Http\Controllers\Profile\ProfileController@store                   | web                                             |
 *  | Cria um perfil de usuário            | GET|HEAD                               | profile/create             | profile.create   | App\Http\Controllers\Profile\ProfileController@create                  | web                                             |
 *  | Exibe o perfil do usuário            | GET|HEAD                               | profile/{profile}          | profile.show     | App\Http\Controllers\Profile\ProfileController@show                    | web                                             |
 *  | Atualiza o perfil do usuário         | PUT|PATCH                              | profile/{profile}          | profile.update   | App\Http\Controllers\Profile\ProfileController@update                  | web                                             |
 *  | Deleta o usuário e seu perfil        | DELETE                                 | profile/{profile}          | profile.destroy  | App\Http\Controllers\Profile\ProfileController@destroy                 | web                                             |
 *  | Mostra formulario de alteracao       | GET|HEAD                               | profile/{profile}/edit     | profile.edit     | App\Http\Controllers\Profile\ProfileController@edit                    | web                                             |
 *  | Rota de registro de usuers           | POST                                   | register                   |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest                                       |
 *  | Rota para exibir form de registro    | GET|HEAD                               | register                   | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest                                       |
 */
Route::resource('profile', 'Profile\ProfileController');

Route::get('/admin', 'Admin\AdminController@index')->name('admin_area');
Route::get('/admin/usuarios', 'Admin\AdminController@showUsers')->name('gerenciar_users');
Route::get('/admin/projetos', 'Admin\AdminController@showProjetos')->name('gerenciar_projetos');
Route::get('/editor/noticias', 'Admin\AdminController@showNoticias')->name('gerenciar_noticias');

Route::get('/admin/ledes', 'Admin\AdminController@showLedes')->name('gerenciar_ledes');
Route::patch('/admin/ledes', 'Admin\AdminController@updateLedes')->name('atualizar_ledes');

Route::post('/contato', 'Contato\ContatoController@sendContatctRequest')->name('enviar_contato');

# GET	/photos/create	create	photos.create
Route::get('projetos/create', 'Admin\AdminController@createProjeto')->name('projetos_create');

#POST	/photos	store	photos.store
Route::post('projetos', 'ProjetosController@storeProjeto')->name('projetos_store');