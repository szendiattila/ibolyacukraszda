<?php

Route::auth();

Route::group(['prefix' => 'filemanager'], function() {
    Route::get('show', 'FilemanagerLaravelController@getShow');
    Route::get('connectors', 'FilemanagerLaravelController@getConnectors');
    Route::post('connectors', 'FilemanagerLaravelController@postConnectors');
});

Route::get('{slug}', '\Modules\Page\Http\Controllers\Frontend\PageController@index');