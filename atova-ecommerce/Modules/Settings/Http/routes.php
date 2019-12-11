<?php

Route::group(['middleware' => 'web', 'prefix' => 'settings'], function()
{
    Route::get('/', 'SettingsController@index');


    Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Settings\Http\Controllers\Admin'], function()
    {
        Route::get('company-info',          'CompanyInfoController@show');
        Route::get('company-info/edit',          'CompanyInfoController@edit');
        Route::put('company-info/edit',          'CompanyInfoController@update');
        
        Route::resource('additions',        'AdditionItemsController');
    });

});
