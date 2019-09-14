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


Route::get('/Products', 'ProductController@all')->name('Products.all');

Route::post('/Products', 'ProductController@create')->name('Products.create');

Route::get('/Products/{Product}', 'ProductController@show')->name('Products.show');

Route::put('/Products/{Product}', 'ProductController@update')->name('Products.update');

Route::delete('/Products/{Product}', 'ProductController@destory')->name('Products.destroy');