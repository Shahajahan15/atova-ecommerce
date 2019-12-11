<?php

Route::group(['middleware' => 'web', 'prefix' => 'expenditure'], function()
{
    Route::get('/', 'ExpenditureController@index');

    Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Expenditure\Http\Controllers\Admin'], function()
    {
        Route::resource('categories',   'ExpenseCategoryController',  ['except' => ['show', 'destroy']]);
        Route::resource('expenses',     'ExpenseController');
    });
});
