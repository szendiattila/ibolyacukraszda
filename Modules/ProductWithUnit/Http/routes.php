<?php

Route::group(['middleware' => 'web', 'prefix' => 'productwithunit', 'namespace' => 'Modules\ProductWithUnit\Http\Controllers'], function () {
    Route::get('/', 'ProductWithUnitController@index');
});
