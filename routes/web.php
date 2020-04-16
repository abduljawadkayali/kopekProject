<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@welcome');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();




Route::resource('users', 'UserController');

Route::Get('profile', 'UserController@profile');

Route::PUT('users.updateUser/{id}', 'UserController@updateUser')->name('users.updateUser');

Route::Get('Me', 'UserController@Me');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');

Route::resource('crud','CrudController');

Route::resource('image','ImageController');

Route::resource('staff','StaffController');

Route::resource('company','CompanyController');
