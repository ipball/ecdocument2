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
    Route::patch('{id}', 'CategorieController@update');
    Route::delete('{id}', 'CategorieController@delete');
    Route::get('datatables', 'CategorieController@getDatatables');    
    Route::get('form/{id}', 'CategorieController@renderForm');
});

Route::prefix('document')->group(function(){
    Route::get('', 'DocumentController@index');
    Route::post('', 'DocumentController@store');
    Route::patch('{id}', 'DocumentController@update');
    Route::delete('{id}', 'DocumentController@delete');
    Route::get('datatables', 'DocumentController@getDatatables');    
    Route::get('form/{id}', 'DocumentController@renderForm');
});