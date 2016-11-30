<?php

Route::group(['middleware' => 'web', 'prefix' => 'dashboard/product', 'namespace' => 'Modules\Product\Http\Controllers'], function () {
    Route::resource('/', 'ProductController');
});
