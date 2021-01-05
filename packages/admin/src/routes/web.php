<?php

Route::group(["namespace" => "HongThao\Admin\Http\Controller", "middleware" => ["web"]], function() {

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

    Route::get('/admin/sign_up', [
        'as'=>'sign_up',
        'uses'=>'AdminController@getSignUp'
    ]);
    
    Route::post('/admin/sign_up', [
        'as'=>'sign_up',
        'uses'=>'AdminController@postSignup'
    ]);

    Route::get('/admin/list_user', [
        'as'=>'list_user',
        'uses'=>'AdminController@getUser'
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
    
    Route::get('/admin/order',[
        'as'=>'list_order',
        'uses'=>'AdminController@getOrderList'
    ]);
    
    
    Route::post('/admin/order',[
        'as'=>'list_order',
        'uses'=>'AdminController@postOrder'
    ]);

});
