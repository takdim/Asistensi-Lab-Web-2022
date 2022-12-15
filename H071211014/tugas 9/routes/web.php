<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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

Route::resource('shop', ShopController::class);


Route::get('shop',[ShopController::class,'shop']) ->name('shop');

Route::post('/insertdata',[ShopController::class,'insertdata'])->name('insertdata');


Route::get('/showdata',[ShopController::class,'showdata']) ->name('showdata');

Route::get('/tampildata/{id}',[ShopController::class,'tampildata']) ->name('tampildata');
Route::post('/edit/{id}',[ShopController::class,'edit'])->name('edit');
Route::get('/delete/{id}',[ShopController::class,'delete'])->name('delete');

 

Route::delete('/showdata/{id}',[ShopController::class,'delete']);