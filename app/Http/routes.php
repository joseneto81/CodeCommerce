<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

///passagem de parametro pela rota
/*
Route::pattern('id', '[0-9]+');
Route::get('user/{id?}', function($id = null){

    if($id)
        return "Ola $id";

    return "Não possui id";

});
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('exemplo', 'ExemploController@exemplo');

/*
//--categories--\
Route::get("categories", ['as'=>'categories','uses'=>'AdminCategoriesController@index']);
Route::get("categories/create", ['as'=>'categories.create','uses'=>'AdminCategoriesController@create']);
Route::post("categories/store", ['as'=>'categories.store','uses'=>'AdminCategoriesController@store']);
Route::get("categories/edit/{id}", ['as'=>'categories.edit','uses'=>'AdminCategoriesController@edit']);
Route::get("categories/delete/{id}", ['as'=>'categories.delete','uses'=>'AdminCategoriesController@delete']);
Route::put("categories/update/{id}", ['as'=>'categories.update','uses'=>'AdminCategoriesController@update']);


//--products--\\
Route::get("products", ['as'=>'products','uses'=>'AdminProductsController@index']);
Route::get("products/create", ['as'=>'products.create','uses'=>'AdminProductsController@create']);
Route::post("products/store", ['as'=>'products.store','uses'=>'AdminProductsController@store']);
Route::get("products/edit/{id}", ['as'=>'products.edit','uses'=>'AdminProductsController@edit']);
Route::get("products/delete/{id}", ['as'=>'products.delete','uses'=>'AdminProductsController@delete']);
Route::put("products/update/{id}", ['as'=>'products.update','uses'=>'AdminProductsController@update']);
*/


/*

//*Route::get('admin/categories', 'AdminCategoriesController@index');
//*Route::get('admin/products', 'AdminProductsController@index');
*/


Route::patterns(['id' => '[0-9]+']);

Route::group(['prefix'=>'admin'], function(){

    Route::group(['prefix'=>'products'], function(){

        Route::get('', ['as'=>'products.index','uses'=>'AdminProductsController@index']);
        Route::get('create', ['as'=>'products.create','uses'=>'AdminProductsController@create']);
        Route::post('store', ['as'=>'products.store','uses'=>'AdminProductsController@store']);
        Route::post('show/{id}', ['as'=>'products.show','uses'=>'AdminProductsController@show']);
        Route::get('edit/{id}', ['as'=>'products.edit','uses'=>'AdminProductsController@edit']);
        Route::put('update/{id}', ['as'=>'products.update','uses'=>'AdminProductsController@update']);
        Route::get('delete/{id}', ['as'=>'products.delete','uses'=>'AdminProductsController@delete']);
    });

    Route::group(['prefix'=>'categories'], function(){

        Route::get('/', ['as'=>'categories.index','uses'=>'AdminCategoriesController@index']);
        Route::get('create', ['as'=>'categories.create','uses'=>'AdminCategoriesController@create']);
        Route::post('store', ['as'=>'categories.store','uses'=>'AdminCategoriesController@store']);
        Route::get('edit/{id}', ['as'=>'categories.edit','uses'=>'AdminCategoriesController@edit']);
        Route::get('show/{id}', ['as'=>'categories.show','uses'=>'AdminCategoriesController@show']);
        Route::put('update/{id}', ['as'=>'categories.update','uses'=>'AdminCategoriesController@update']);
        Route::get('delete/{id}', ['as'=>'categories.delete','uses'=>'AdminCategoriesController@delete']);
    });
});

/***
//***a partir do capitulo 6***\\
Route::patterns(['id' => '[0-9]+']);

Route::group(['prefix'=>'admin'], function(){

    Route::group(['prefix'=>'products'], function(){

        Route::get('', ['as'=>'product.index','uses'=>'AdminProductsController@index']);
        Route::get('create', ['as'=>'product.create','uses'=>'AdminProductsController@create']);
        Route::post('store/{product}', ['as'=>'product.store','uses'=>'AdminProductsController@store']);
        Route::post('show/{product}', ['as'=>'product.show','uses'=>'AdminProductsController@show']);
        Route::get('edit/{product}', ['as'=>'product.edit','uses'=>'AdminProductsController@edit']);
        Route::put('update/{product}', ['as'=>'product.update','uses'=>'AdminProductsController@update']);
        Route::get('delete/{product}', ['as'=>'product.delete','uses'=>'AdminProductsController@delete']);
    });

    Route::group(['prefix'=>'categories'], function(){

        Route::get('/', ['as'=>'categories.index','uses'=>'AdminCategoriesController@index']);
        Route::get('create', ['as'=>'categories.create','uses'=>'AdminCategoriesController@create']);
        Route::post('store/{category}', ['as'=>'categories.store','uses'=>'AdminCategoriesController@store']);
        Route::get('edit/{category}', ['as'=>'categories.edit','uses'=>'AdminCategoriesController@edit']);
        Route::get('show/{category}', ['as'=>'categories.show','uses'=>'AdminCategoriesController@show']);
        Route::put('update/{category}', ['as'=>'categories.update','uses'=>'AdminCategoriesController@update']);
        Route::get('delete/{category}', ['as'=>'categories.delete','uses'=>'AdminCategoriesController@delete']);
    });
});
***/