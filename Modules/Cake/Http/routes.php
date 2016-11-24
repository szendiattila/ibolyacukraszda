<?php

Route::group(['middleware' => ['web', 'dashboard'], 'prefix' => 'dashboard', 'namespace' =>
    'Modules\Cake\Http\Controllers\Dashboard'],
    function()
{
    Route::resource('/cake', 'CakeController');
});
