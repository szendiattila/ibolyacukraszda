<?php

Route::group(['middleware' => 'web', 'prefix' => 'dashboard', 'namespace' => 'Modules\Menu\Http\Controllers\Dashboard'], function()
{
    Route::resource('menu', 'MenuController');
});
