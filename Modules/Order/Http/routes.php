<?php

Route::group(['middleware' => 'web', 'prefix' => 'dashboard', 'namespace' => 'Modules\Order\Http\Controllers\Dashboard'], function () {
    Route::resource('/order', 'OrderController');
});

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Order\Http\Controllers\Frontend'], function () {

    Route::post('/rendeles-veglegesites-ajax', 'OrderController@orderAjax');

});
