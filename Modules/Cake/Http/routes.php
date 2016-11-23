<?php

Route::group(['middleware' => ['web', 'dashboard'], 'prefix' => 'dashboard/cake', 'namespace' =>
    'Modules\Cake\Http\Controllers'],
    function()
{
    Route::get('/', 'CakeController@index');
});
