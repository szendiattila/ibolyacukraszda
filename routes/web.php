<?php

Route::auth();

Route::get('{slug}', '\Modules\Page\Http\Controllers\Frontend\PageController@index');