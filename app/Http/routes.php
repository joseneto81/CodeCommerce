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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', 'StoreController@index');
Route::get('/home', 'StoreController@index');
//Route::get('/category/{id}', 'StoreController@category');
//Route::get('exemplo', 'ExemploController@exemplo');


Route::group(['prefix' => ''], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'StoreController@index']);
    Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
    Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
    Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);
    Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::get('cart/remove/{id}', ['as' => 'cart.remove', 'uses' => 'CartController@remove']);
    Route::post('cart/update', ['as' => 'cart.update', 'uses' => 'CartController@update']);

    //Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);

});

Route::group(['middleware'=>'auth'], function(){
    Route::get('checkout/placeOrder', ['as'=>'checkout.place', 'uses'=>'CheckoutController@place']);
    Route::get('store/orders', ['as'=>'store.orders', 'uses'=>'AccountController@orders']);
});



Route::patterns(['id' => '[0-9]+']);

Route::group(['prefix'=>'admin', 'middleware'=>'auth_admin', 'where'=> ['id'=> '[0-9]+']],  function(){

    Route::group(['prefix'=>'products'], function(){

        Route::get('', ['as'=>'products.index','uses'=>'AdminProductsController@index']);
        Route::get('create', ['as'=>'products.create','uses'=>'AdminProductsController@create']);
        Route::post('store', ['as'=>'products.store','uses'=>'AdminProductsController@store']);
        Route::post('show/{id}', ['as'=>'products.show','uses'=>'AdminProductsController@show']);
        Route::get('edit/{id}', ['as'=>'products.edit','uses'=>'AdminProductsController@edit']);
        Route::put('update/{id}', ['as'=>'products.update','uses'=>'AdminProductsController@update']);
        Route::get('delete/{id}', ['as'=>'products.delete','uses'=>'AdminProductsController@delete']);

        Route::group(['prefix'=>'images'], function(){
            //site.com.br/products/images/{id}
            Route::get('{id}', ['as'=>'products.images','uses'=>'AdminProductsController@images']);
            Route::get('create/{id}', ['as'=>'products.images.create','uses'=>'AdminProductsController@createImage']);
            Route::post('store/{id}', ['as'=>'products.images.store','uses'=>'AdminProductsController@storeImage']);
            Route::get('destroy/{id}', ['as'=>'products.images.destroy','uses'=>'AdminProductsController@destroyImage']);
        });

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

    Route::group(['prefix'=> 'orders', 'as' => 'admin.orders.'],function(){
        Route::get('', ['as' => 'index', 'uses' => 'AdminOrdersController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'AdminOrdersController@show']);
        Route::get('create', ['as' => 'create', 'uses' => 'AdminOrdersController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'AdminOrdersController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminOrdersController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'AdminOrdersController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'AdminOrdersController@destroy']);
    });
});

//Route::get("auth/login", 'Auth\AuthController'); //getLogin (Auth\AuthController nativo do Laravel). deve chamar a tela onde o usuario sera redirecionado ao logar.
//Route::post("auth/login", 'Auth\AuthController@postLogin'); //postLogin (Auth\AuthController nativo do Laravel). após logar, o usuario é redirecionado para pagina acessada anteriormente.
//Route::get("auth/logout", 'Auth\AuthController@getLogout');
//Route::get("auth/password", 'Auth\AuthController@getPassword');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'test'     => 'TestController'
]);




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
