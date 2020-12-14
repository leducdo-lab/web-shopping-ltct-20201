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
    'uses' => 'PageController@getIndex',
    'uses' => 'SearchController@getTrending'
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

Route::get('/info', [
    'as'=> 'info_user',
    'uses' => 'UserController@getInfo_User'
]);

Route::get('/change_password', [
    'as'=> 'change_password',
    'uses' => 'UserController@ChangePassWord'
]);

Route::post('/change_password',[
    'as'=> 'change_password',
    'uses' => 'UserController@postChangePassWord'
]);

// Đăng ký người dùng
Route::get('/register', [
    'as'=> 'register',
    'uses' => 'UserController@getRegister_User'
]);
// end đăng ký người dùng
Route::post('/register', [
    'as'=> 'register',
    'uses' => 'UserController@postRegister_User'
]);

Route::get('/logout', [
    'as'=> 'logout',
    'uses' => 'PageController@getLogout'
]);

// Xử lý bên admin.

Route::get('/admin/dashboard', [
    'as'=>'dashboard',
    'uses'=>'AdminController@getIndex'
]);

Route::get('/admin/logout', [
    'as'=>'logout_admin',
    'uses'=> 'AdminController@logoutAdmin'
]);

Route::get('/admin/list_product', [
    'as'=>'list_product',
    'uses'=>'AdminController@getListProduct'
]);

Route::get('/admin/remove_product', [
    'as'=>'remove_product',
    'uses'=>'ProductController@getRemoveProduct'
]);

Route::get('/admin/list_user', [
    'as'=>'list_user',
    'uses'=>'AdminController@getUser'
]);

Route::get('/admin/add_product', [
    'as'=>'add_product',
    'uses'=>'ProductController@getAddProduct'
]);

Route::post('/admin/add_product', [
    'as'=>'add_product',
    'uses'=>'ProductController@postAddProduct'
]);

Route::get('/admin/edit_product', [
    'as'=>'edit_product',
    'uses'=>'ProductController@getEditProduct'
]);

Route::post('/admin/edit_product', [
    'as'=>'edit_product',
    'uses'=>'ProductController@postEditProduct'
]);

Route::get('/admin/sign_up', [
    'as'=>'sign_up',
    'uses'=>'AdminController@getSignUp'
]);

Route::post('/admin/sign_up', [
    'as'=>'sign_up',
    'uses'=>'AdminController@postSignup'
]);

Route::get('/admin/list_admin', [
    'as'=>'list_admin',
    'uses'=>'AdminController@getListAdmin'
]);

Route::get('/admin/edit', [
        'as'=>'edit_admin',
        'uses'=>'AdminController@getEditAdmin'
]);

Route::get('/admin/remove', [
    'as'=>'remove_admin',
    'uses'=>'AdminController@getRemoveAdmin'
]);
// end bên admin

Route::get('/home/product', [
    'as'=>'product',
    'uses'=>'SearchController@getAllProduct'
]);

Route::get('/home/single', [
    'as'=>'single',
    'uses'=>'SearchController@getProduct'
]);

Route::post('/home/search', [
    'as'=>'search',
    'uses'=>'SearchController@postSearch'
]);

Route::get('/home/type',[
    'as'=>'type',
    'uses'=>'SearchController@getProductsType'
]);

Route::get('/home/cost',[
    'as'=>'cost',
    'uses'=>'SearchController@getProductsCost'
]);
