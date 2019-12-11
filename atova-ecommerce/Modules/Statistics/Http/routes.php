<?php

Route::group(['middleware' => 'web', 'prefix' => 'statistics'], function()
{
    Route::get('/', 'StatisticsController@index');

    Route::group(['middleware' => 'web', 'namespace' => 'Modules\Statistics\Http\Controllers\Admin'], function()
    {
        Route::get('dashboard', 'DashboardController@index');
    });

});
