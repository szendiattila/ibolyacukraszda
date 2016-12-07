<?php

Route::group(['middleware' => 'web', 'prefix' => 'order', 'namespace' => 'Modules\Order\Http\Controllers'], function () {
    Route::get('/', 'OrderController@index');
});

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Order\Http\Controllers\Frontend'], function () {

    Route::post('/rendeles-veglegesites-ajax', 'OrderController@orderAjax');

});
