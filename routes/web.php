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
    return view('master');
});
Route::get('categories', 'CategoriesController@index')->name("categories.index");

Route::get('categories/create', 'CategoriesController@create')->name("categories.create");
Route::post('categories/store', 'CategoriesController@store')->name("categories.store");
Route::get('categories/{id}/edit','CategoriesController@edit')->name("categories.edit");
Route::post('categories/update/{id}', 'CategoriesController@update')->name("categories.update");
Route::get('categories/{id}/destroy', 'CategoriesController@destroy');

Route::get('products', 'ProductController@index')->name("products.index");

Route::get('products/create', 'ProductController@create')->name("products.create");
Route::post('products/store', 'ProductController@store')->name("products.store");
Route::get('products/{id}/edit','ProductController@edit')->name("products.edit");
Route::post('products/update/{id}', 'ProductController@update')->name("products.update");
Route::get('products/{id}/destroy', 'ProductController@destroy');



