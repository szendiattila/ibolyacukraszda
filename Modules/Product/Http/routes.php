<?php

Route::group(['middleware' => 'web', 'prefix' => 'dashboard', 'namespace' =>
    'Modules\Product\Http\Controllers\Dashboard'], function () {

    Route::resource('/product', 'ProductController');
});
