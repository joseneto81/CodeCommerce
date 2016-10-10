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


//*Route::get('admin/categories', 'AdminCategoriesController@index');
//*Route::get('admin/products', 'AdminProductsController@index');


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

    Route::group(['prefix'=>'category'], function(){

        Route::get('', ['as'=>'category.index','uses'=>'AdminCategoriesController@index']);
        Route::get('create', ['as'=>'category.create','uses'=>'AdminCategoriesController@create']);
        Route::post('store/{category}', ['as'=>'category.store','uses'=>'AdminCategoriesController@store']);
        Route::get('edit/{category}', ['as'=>'category.edit','uses'=>'AdminCategoriesController@edit']);
        Route::get('show/{category}', ['as'=>'category.show','uses'=>'AdminCategoriesController@show']);
        Route::put('update/{category}', ['as'=>'category.update','uses'=>'AdminCategoriesController@update']);
        Route::get('delete/{category}', ['as'=>'category.delete','uses'=>'AdminCategoriesController@delete']);
    });
});
