<?php

Route::group(['middleware' => 'web', 'prefix' => 'dashboard', 'namespace' => 'Modules\Page\Http\Controllers\Dashboard'], function()
{
    Route::resource('/page', 'PageController');
});

