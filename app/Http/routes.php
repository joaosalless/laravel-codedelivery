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

Route::get('/', function () {
    return view('app');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.checkrole'], function () {

    /** ------------------------------------------------------------------------
     *  Categories
     *  ------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CategoriesController@index']);
        Route::get('criar',           ['as' => 'create',  'uses' => 'CategoriesController@create']);
        Route::get('{id}',            ['as' => 'show',    'uses' => 'CategoriesController@show']);
        Route::post('salvar',         ['as' => 'store',   'uses' => 'CategoriesController@store']);
        Route::get('{id}/editar',     ['as' => 'edit',    'uses' => 'CategoriesController@edit']);
        Route::post('{id}/atualizar', ['as' => 'update',  'uses' => 'CategoriesController@update']);
        Route::get('{id}/remover',    ['as' => 'destroy', 'uses' => 'CategoriesController@destroy']);
    });

    /** ------------------------------------------------------------------------
     *  Products
     *  ------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/',               ['as' => 'index',   'uses' => 'ProductsController@index']);
        Route::get('criar',           ['as' => 'create',  'uses' => 'ProductsController@create']);
        Route::get('{id}',            ['as' => 'show',    'uses' => 'ProductsController@show']);
        Route::post('salvar',         ['as' => 'store',   'uses' => 'ProductsController@store']);
        Route::get('{id}/editar',     ['as' => 'edit',    'uses' => 'ProductsController@edit']);
        Route::post('{id}/atualizar', ['as' => 'update',  'uses' => 'ProductsController@update']);
        Route::get('{id}/remover',    ['as' => 'destroy', 'uses' => 'ProductsController@destroy']);
    });
});
