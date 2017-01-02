<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'dashboard', 'namespace' => 'Modules\Order\Http\Controllers\Dashboard'], function () {
    Route::resource('/order', 'OrderController',
        ['except' => ['create', 'store', 'update', 'show', 'edit']]
    );

    Route::post('order-status-change-ajax', 'OrderController@changeOrderStatus');
});

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Order\Http\Controllers\Frontend'], function () {

    Route::post('/rendeles-veglegesites-ajax', 'OrderController@orderAjax');

});
