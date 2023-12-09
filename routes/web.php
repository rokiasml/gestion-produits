<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CardController;


Route::resource('produits',ProduitController::class) ->middleware('auth');
Route::resource('products',ProductsController::class)->middleware('auth');
Route::resource('cart',CardController::class)->middleware('auth');


Route::post('/addToCart/{idproduit}', 'CardController@addToCart')->name('cart.add');
Route::get('/cart', 'CardController@showCart')->name('cart.show');
Route::get('/', function () {
   
});

Auth::routes();

   

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

