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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
   function () {
      //Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

    Route::prefix ('dashboard')->name('dashboard.')->middleware(['auth'])->group(function()
    {
        Route::get('/index','DashboardController@index')->name('index');
   

     //route category
     Route::resource('categories', 'CategoryController')->except(['show']);
     //route product
     Route::resource('products', 'ProductController')->except(['show']);
     //route clients
     Route::resource('clients', 'ClientController')->except(['show']);
     Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

     //order routes
     Route::resource('orders', 'OrderController');
     Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');

       //route users
    Route::resource('users', 'UserController')->except(['show']);
    
    });
    

  });






