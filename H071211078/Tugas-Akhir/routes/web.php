<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/* Front End */
Route::get('/', [App\Http\Controllers\FrontEndController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Category Routing */
Route::get('/category/add',[App\Http\Controllers\CategoryController::class, 'index'])->name('show_cate_table');
Route::post('/category/save',[App\Http\Controllers\CategoryController::class, 'save'])->name('cate_save');
Route::get('/category/manage',[App\Http\Controllers\CategoryController::class, 'manage'])->name('manage_cate');
Route::get('/category/active/{category_id}',[App\Http\Controllers\CategoryController::class, 'active'])->name('active_cate');
Route::get('/category/Inactive/{category_id}',[App\Http\Controllers\CategoryController::class, 'Inactive'])->name('Inactive_cate');
Route::get('/category/delete/{category_id}',[App\Http\Controllers\CategoryController::class, 'delete'])->name('cate_delete');
Route::post('/category/update',[App\Http\Controllers\CategoryController::class, 'update'])->name('cate_update');

/* Book Routing */
Route::get('/book/add',[App\Http\Controllers\BookController::class,'index'])->name('show_book_table');
Route::post('/book/save',[App\Http\Controllers\BookController::class,'save'])->name('book_save');
Route::get('/book/manage',[App\Http\Controllers\BookController::class,'manage'])->name('manage_book');
Route::get('/book/delete/{book_id}', [App\Http\Controllers\BookController::class, 'delete'])->name('book_delete');
Route::post('/book/update',[App\Http\Controllers\BookController::class,'update'])->name('book_update');
Route::get('/book/active/{book_id}',[App\Http\Controllers\BookController::class, 'active'])->name('active_book');
Route::get('/book/Inactive/{book_id}',[App\Http\Controllers\BookController::class, 'Inactive'])->name('Inactive_book');

/* User Routing */
Route::get('/user/manage', [App\Http\Controllers\userController::class,'manage'])->name('manage_user');
Route::get('/user/delete/{id}', [App\Http\Controllers\userController::class,'delete'])->name('user_delete');