<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main');
});
Route::get('products','ProductController@index')->name('product.index');
//Cần hỏi kỹ về products
Route::get('create','ProductController@create')->name('create.product');//create.product mà tại sao ko phải product.create là link đến file create trong product
Route::post('store','ProductController@Store')->name('product.store');//Cần đc giải thích vì link đến funcion Controller khi thêm vào nút submit
Route::get('edit/product/{id}','ProductController@Edit');
//Phần edit product
Route::get('delete/product/{id}','ProductController@Delete');
//Phần delete product
Route::get('show/product/{id}','ProductController@Show');
//Phần show product
Route::get('/search','ProductController@search');
//Phần edit product
Route::post('update/product/{id}','ProductController@Update');
//update lại sản phẩm.cần được giải thích thêm về post