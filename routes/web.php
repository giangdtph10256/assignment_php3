<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Database\Seeders\CateSeeder;

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

Route::get('login', 'Auth\LoginController@GetLoginForm')->name('auth.getLoginForm');
Route::post('login', 'Auth\LoginController@PostLogin')->name('auth.postLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('/','Front_end\page@getIndex')->name('front_end.index');
Route::get('detail-product','Front_end\DetailProductController@index')->name('detailPro');

Route::get('shop','Front_end\page@shop')->name('shop');
Route::get('category/{id}', 'Front_end\page@product')->name('cate-pro');
Route::get('/detail/{id}','Front_end\page@detail_product')->name('detail');
Route::get('/search','Front_end\page@search')->name('search.product');
Route::get('/fillter','Front_end\page@fillter')->name('fillter');


Route::get('/layout', function(){
    return view('layout');
})->name('layout');
// cate
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => 'adminLogin',
], function () {
    Route::group([
        'prefix' => '/categories',
        'as' => 'categories.',
    ], function () {
        Route::get('/','CateController@index')->name('index');
        Route::get('/createCate', 'CateController@create')->name('create');
        Route::post('/store','CateController@store')->name('store');
        Route::get('/editCate/{cate}','CateController@edit')->name('edit');
        Route::post('/updateCate/{cate}','CateController@update')->name('update');
        Route::post('/delete/{cate}','CateController@delete')->name('delete');
    });
});

// user
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => 'adminLogin',
], function () {
    Route::group([
        'prefix' => 'users',
        'as' => 'users.',
    ], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/{user}', 'UserController@show')->name('show');
        Route::get('create', 'UserController@create')->name('create');
        Route::post('store', 'UserController@store')->name('store');
        Route::get('edit/{user}', 'UserController@edit')->name('edit');
        Route::post('update/{user}', 'UserController@update')->name('update');
        Route::post('delete/{user}', 'UserController@delete')->name('delete');
    });
});

// product
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => 'adminLogin',
], function () {
    Route::group([
        'prefix' => '/products',
        'as' => 'products.',
    ], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/createProduct','ProductController@create')->name('create');
        Route::get('/editProduct/{product}','ProductController@edit')->name('edit');
        Route::post('/updateProduct/{product}','ProductController@update')->name('update');
        Route::post('/delete/{product}','ProductController@delete')->name('delete');
    });
});