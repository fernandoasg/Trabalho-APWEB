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
Route::post('/ajax_cidades','AjaxController@getCidades');
Route::post('/ajax_estado_cidade','AjaxController@getEstadoCidade');

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
Route::resource('profile', 'Profile\\ProfileController');
