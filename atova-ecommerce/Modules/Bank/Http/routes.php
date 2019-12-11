<?php

Route::group(['middleware' => 'web', 'prefix' => 'bank'], function()
{
    Route::get('/', 'BankController@index');

    Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Modules\Bank\Http\Controllers\Admin'], function()
    {
        Route::resource('accounts',     'BankAccountsController');
        Route::resource('deposits',     'DepositsController');
        Route::resource('withdraws',    'WithdrawsController');
        Route::resource('purposes',     'PurposeController',       ['except' => ['show']]);
    });

});
