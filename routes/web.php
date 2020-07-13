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
    return view('welcome');
});
/**
 * Продавцы
 */
Route::group([
    'prefix' => 'sellers'
],function(){
    Route::get('/','SellersController@index')->name('sellers');
    Route::get('/create','SellersController@create')->name('sellercreate');
    Route::get('/redact/{id}','SellersController@redact')->name('redactseller');
    Route::get('/delete/{id}','SellersController@drop')->name('deleteseller');
    Route::get('/search','SellersController@search')->name('sellersearch');
    Route::post('/save','SellersController@saveseller')->name('saveseller');
    Route::post('/update','SellersController@update')->name('updateseller');
});
/**
 * Продукты
 */
Route::group([
    'prefix'=> 'products'
],function(){
    Route::get('/','ProductsController@index')->name('products');
    Route::get('/create','ProductsController@create')->name('productcreate');
    Route::get('/delete/{id}','ProductsController@drop')->name('deleteproduct');
    Route::get('/redact/{id}','ProductsController@redact')->name('redactproduct');
    Route::get('/search','ProductsController@search')->name('productsearch');
    Route::post('/save','ProductsController@saveproduct')->name('saveproduct');
    Route::post('/update','ProductsController@update')->name('updateproduct');
});

/**
 * Производители
 */
Route::group([
    'prefix'=> 'manufacturers'
],function(){
    Route::get('/','ManufacturersController@index')->name('manufacturers');
    Route::get('/create','ManufacturersController@create')->name('manufacturerscreate');
    Route::get('/delete/{id}','ManufacturersController@drop')->name('manufacturersdel');
    Route::get('/redact/{id}','ManufacturersController@redact')->name('manufacturersredact');
    Route::get('/search','ManufacturersController@search')->name('manufacturerssearch');

    Route::post('/save','ManufacturersController@savemanufactur')->name('savemanufacturers');
    Route::post('/update','ManufacturersController@update')->name('updatemanufacturers');
});

/**
 * Модели
 */
Route::group([
    'prefix'=> 'models'
],function(){
    Route::get('/','ModelsController@index')->name('models');
    Route::get('/create','ModelsController@create')->name('modelscreate');
    Route::get('/delete/{id}','ModelsController@drop')->name('modelsdel');
    Route::get('/redact/{id}','ModelsController@redact')->name('modelsredact');
    Route::get('/search','ModelsController@search')->name('modelssearch');

    Route::post('/save','ModelsController@savemodels')->name('savemodels');
    Route::post('/update','ModelsController@update')->name('updatemodels');
});


/**
 * Прайслист
 */
Route::group([
    'prefix' => 'pricelist'
], function(){
    Route::get('/','PriceListController@index')->name('pricelist');
    Route::get('/create','PriceListController@create')->name('pricelistcreate');

    Route::get('/delete/{id}','PriceListController@drop')->name('pricelistsdel');
    Route::get('/redact/{id}','PriceListController@redact')->name('pricelistredact');

    Route::post('/save','PriceListController@save')->name('savepricelist');
    Route::post('/getmodels','PriceListController@getmodels')->name('getmodels');
});
