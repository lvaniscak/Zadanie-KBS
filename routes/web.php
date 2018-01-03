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

Route::get('user/create','UserController@create' );
Route::get('admin/login','AdministrationController@showLogin' );
Route::get('admin/dashboard', 'AdministrationController@showDashboard');

Route::post('admin','AdministrationController@doLogin' );
Route::post('admin/editUser','AdministrationController@showEditModal' );
Route::post('admin/updateUser','AdministrationController@updateUser' );

Route::get('user/list','UserController@showAll' );
Route::post('user', 'UserController@store');

Route::get('hobbies/compare','HobbyController@index');
Route::post('hobbies','HobbyController@compare');

Route::get('/',function(){
  return view('welcome');
});

Auth::routes();
