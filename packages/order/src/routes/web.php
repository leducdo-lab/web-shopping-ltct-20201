<?php

Route::group(["namespace" => "Phuong\Order\Http\Controller", "middleware" => ["web"]], function() {

    Route::get('/cart', [
        'as'=> 'cart',
        'uses' => 'CartController@getCart'
    ]);

    Route::post('/cart/add',[
        'as'=>'add_cart',
        'uses'=>'CartController@postProducts'
    ]);

    Route::get('/home/checkout', [
        'as' => 'checkout',
        'uses' => 'PayController@getCheckout'
    ]);

    Route::post('/home/checkout', [
        'as' => 'checkout',
        'uses' => 'PayController@postCheckout'
    ]);

    Route::get('/cart/remove',[
        'as'=>'remove',
        'uses'=>'CartController@removeCart'
    ]);

    Route::get('/home/order',[
        'as' => 'order_infor',
        'uses' => 'CartController@getOrderInformation'
    ]);

    Route::post('/home/cancel', [
        'as' => 'cancel_order',
        'uses' => 'CartController@postCancel'
    ]);

});
