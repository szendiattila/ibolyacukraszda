<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'dashboard', 'namespace' =>
    'Modules\Category\Http\Controllers\Dashboard'], function()
{
    Route::resource('/category', 'CategoryController');
});
