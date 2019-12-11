<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Frontend\Http\Controllers'], function()
{
    Route::get('/', 'HomeController@index');
    Route::get('/products/{cat_id?}/{slug?}', 'ProductController@index')->name('product_list')->where('cat_id', '[0-9]+');
    Route::get('/{id}/{slug}', 'ProductController@show')->name('product_details')->where('id', '[0-9]+');
});
