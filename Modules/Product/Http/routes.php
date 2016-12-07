<?php

Route::group(['middleware' => 'web', 'prefix' => 'dashboard', 'namespace' =>
    'Modules\Product\Http\Controllers\Dashboard'], function () {

    Route::resource('/product', 'ProductController');

});


Route::group(['middleware' => 'web', 'namespace' => 'Modules\Product\Http\Controllers\Frontend'], function () {

    Route::get('getProduct/{id}/{type}', 'ProductController@getProductById');
});

