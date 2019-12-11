<?php

Route::group(['middleware' => 'web', 'prefix' => 'invest'], function()
{
    Route::get('/', 'InvestController@index');

    Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Modules\Invest\Http\Controllers\Admin'], function()
    {

        Route::resource('investors', 'InvestorController');
        Route::resource('invests', 'InvestsController');
        Route::resource('withdraws', 'WithdrawController');

    });
});
