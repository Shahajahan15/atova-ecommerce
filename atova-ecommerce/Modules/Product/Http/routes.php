<?php

Route::group(['middleware' => 'web', 'prefix' => 'product'], function()
{
    Route::get('/', 'ProductController@index');


    Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Modules\Product\Http\Controllers\Admin'], function()
    {
        Route::resource('categories',           'CategoryController');
        Route::resource('brands',               'BrandController');
        Route::resource('products',             'ProductsController');
        Route::get('stocks',                     'StocksController@index');

        Route::resource('attribute-groups',     'AttributeGroupController', ['except'=>['show']]);
        Route::resource('attributes',           'AttributeController', ['except'=>['show']]);

        Route::get('specifications/{group_id}',     'SpecificationsController@specificationOfGroup');
        Route::get('specifications/product/{id}',     'SpecificationsController@specificationOfProduct');

    });


    Route::group(['prefix' => 'api', 'middleware' => 'auth', 'namespace' => 'Modules\Product\Http\Controllers\Api'], function()
    {

        Route::get('products/{q?}',     'ProductsController@index');

    });


});
