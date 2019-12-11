<?php

Route::group(['middleware' => 'web', 'prefix' => 'accounts'], function()
{
    Route::get('/', 'AccountsController@index');


    Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Modules\Accounts\Http\Controllers\Admin'], function()
    {
        Route::resource('categories', 'CategoryController',  ['except' => ['show', 'destroy']]);
        Route::resource('payment-methods', 'PaymentMethodsController',  ['except' => ['show', 'destroy']]);

        Route::resource('payments', 'PaymentsController');
        Route::resource('receipts', 'ReceiptsController');

    });


});
