<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'dashboard', 'namespace' => 'Modules\ProductWithUnit\Http\Controllers\Dashboard'], function () {
    Route::resource('/productwithunit', 'ProductWithUnitController');
});
