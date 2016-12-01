<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Frontend\Http\Controllers'], function () {
    Route::get('/', 'FrontendController@products');
    Route::get('/rolunk', 'FrontendController@aboutUs');
    Route::get('/kapcsolat', 'FrontendController@contact');
    Route::get('/cukraszda', 'FrontendController@sweetShop');
    Route::post('/rendeles', 'FrontendController@order');
});
