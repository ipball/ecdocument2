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
Route::get('/', 'CategorieController@index');

Route::prefix('categorie')->group(function(){
    Route::get('', 'CategorieController@index');
    Route::post('', 'CategorieController@store');
    Route::get('datatables', 'CategorieController@getDatatables');
    Route::get('{id}', 'CategorieController@getById');
});