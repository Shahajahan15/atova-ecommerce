<?php

Route::group(['middleware' => 'web', 'prefix' => 'hr'], function()
{
    Route::get('/', 'Modules\Hr\Http\Controllers\Admin\EmployeeController@index');


    Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Modules\Hr\Http\Controllers\Admin'], function()
    {
        Route::get('/', 'EmployeeController@index');
        Route::resource('designations', 'DesignationController');
        Route::resource('tier-types', 'TierTypeController');
        Route::resource('employees', 'EmployeeController');
        Route::resource('customers', 'CustomerController');
        Route::resource('suppliers', 'SupplierController');
    });

});
