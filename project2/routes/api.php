<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Products', 'ProductController@getAll')->name('Products.getAll');

Route::post('/Products', 'ProductController@create')->name('Products.create');

Route::get('/Products/{Product}', 'ProductController@show')->name('Products.show');

Route::put('/Products/{Product}', 'ProductController@update')->name('Products.update');

Route::delete('/Products/{Product}', 'ProductController@destroy')->name('Products.destroy');




Route::get('/Orders', 'OrderController@getAll')->name('Orders.getAll');

Route::post('/Orders', 'OrderController@create')->name('Orders.create');

Route::get('/Orders/{Order}', 'OrderController@show')->name('Orders.show');

Route::put('/Orders/{Order}', 'OrderController@update')->name('Orders.update');

Route::delete('/Orders/{Order}', 'OrderController@destroy')->name('Orders.destroy');