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

/*
 *  | Mostrar perfil usuário logado        | GET|HEAD                               | profile                    | profile.index    | App\Http\Controllers\Profile\ProfileController@index                   | web                                             |
 *  | Mostrar perfil usuário logado        | POST                                   | profile                    | profile.store    | App\Http\Controllers\Profile\ProfileController@store                   | web                                             |
 *  | Mostrar perfil usuário logado        | GET|HEAD                               | profile/create             | profile.create   | App\Http\Controllers\Profile\ProfileController@create                  | web                                             |
 *  | Mostrar perfil usuário logado        | GET|HEAD                               | profile/{profile}          | profile.show     | App\Http\Controllers\Profile\ProfileController@show                    | web                                             |
 *  | Mostrar perfil usuário logado        | PUT|PATCH                              | profile/{profile}          | profile.update   | App\Http\Controllers\Profile\ProfileController@update                  | web                                             |
 *  | Mostrar perfil usuário logado        | DELETE                                 | profile/{profile}          | profile.destroy  | App\Http\Controllers\Profile\ProfileController@destroy                 | web                                             |
 *  | Mostrar perfil usuário logado        | GET|HEAD                               | profile/{profile}/edit     | profile.edit     | App\Http\Controllers\Profile\ProfileController@edit                    | web                                             |
 *  | Mostrar perfil usuário logado        | POST                                   | register                   |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest                                       |
 *  | Mostrar perfil usuário logado        | GET|HEAD                               | register                   | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest                                       |
 */
Route::resource('profile', 'Profile\\ProfileController');
