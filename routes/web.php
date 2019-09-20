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
Route::get('/product/{product_name}', ['uses' => 'productDetailController@index', 'as' => 'name']);
Route::get('/shop/{type}', ['uses' => 'shopController@index', 'as' => 'type']);
// Route::get('/shop/{type}', ['uses' => 'shopController@index', 'as' => 'type']);
// Route::post('/image-upload', 'productController@addImage')->name('image.upload.post');
Route::get('/contact', 'contactController@index');
Route::get('/manage', 'manageController@index');


Route::post('/login', 'loginController@login');
Route::get('/logout', 'loginController@logout');
Route::post('/addProduct', 'productController@addProduct');
