<?php

Route::group(['middleware' => 'web', 'prefix' => 'deliver'], function()
{
    Route::get('/', 'DeliverController@index');


    Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Modules\Deliver\Http\Controllers\Admin'], function()
    {
        Route::resource('invoices', 'InvoiceController');
        Route::get('invoices/items/{invoice_id}', 'InvoiceItemController@index');
        Route::resource('invoices/items', 'InvoiceItemController', ['except' => ['index', 'show']]);

        Route::get('single-add-red/{id}', 'AddRedController@show');

        Route::post('additions/{invoice_id}', 'AdditionController@index');
        Route::delete('additions/delete/{id}', 'AdditionController@destroy');
        Route::post('additions', 'AdditionController@store');

        Route::post('reductions/{invoice_id}', 'ReductionController@index');
        Route::delete('reductions/delete/{id}', 'ReductionController@destroy');
        Route::post('reductions', 'ReductionController@store');

        Route::get('payments/{invoice_id}',    'PaymentController@index');
        Route::post('payments',                 'PaymentController@store');
        Route::delete('payments/delete/{id}',   'PaymentController@destroy');

    });

});
