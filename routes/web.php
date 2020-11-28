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

Route::get('/', [
    'as' => 'home',
    'uses' => 'PageController@getIndex'
]);

Route::get('/home', [
    'as' => 'home_1',
    'uses' => 'PageController@getIndex'
]);

Route::get('/login', [
    'as'=> 'login',
    'uses' => 'PageController@getLogin'
]);

Route::post('/login', [
    'as'=> 'login',
    'uses' => 'PageController@postLogin'
]);

Route::get('/register', [
    'as'=> 'register',
    'uses' => 'PageController@getRegister'
]);

Route::post('/register', [
    'as'=> 'register',
    'uses' => 'PageController@postRegister'
]);

Route::get('/logout', [
    'as'=> 'logout',
    'uses' => 'PageController@getLogout'
]);

Route::get('/admin/dashboard', [
    'as'=>'dashboard',
    'uses'=>'AdminController@getIndex'
]);

Route::get('/admin/list_product', [
    'as'=>'list_product',
    'uses'=>'AdminController@getProduct'
]);

Route::get('/admin/list_user', [
    'as'=>'list_user',
    'uses'=>'AdminController@getUser'
]);

Route::get('/admin/add_product', [
    'as'=>'add_product',
    'uses'=>'AdminController@getAddProduct'
]);

Route::get('/admin/sign_up', [
    'as'=>'sign_up',
    'uses'=>'AdminController@getSignUp'
]);
