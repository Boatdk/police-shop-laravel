<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'homeController@index');
Route::get('/login', 'loginController@index');
Route::get('/shop', 'shopController@index');
Route::get('/product', 'productController@index');
Route::get('/product_detail/{product_name}', ['uses' => 'productDetailController@index', 'as' => 'detail']);



Route::post('/login', 'loginController@login');
Route::post('/logout', 'loginController@logout');
Route::post('/addProduct', 'productController@addProduct');
