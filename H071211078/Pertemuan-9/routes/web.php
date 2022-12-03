<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\sellerPermissionController;

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

//------------------------------------------------PRODUCTS-----------------------------------------------------------------

Route::get('/products', [ProductController::class, 'showProduct']); // ELOQUENT
Route::post('saveProductUseEloquent', [ProductController::class, 'saveProductUseEloquent']); // ELOQUENT
Route::post('editProductUseEloquent/{id}', [ProductController::class, 'editProductUseEloquent']); // ELOQUENT
Route::get('deleteProductUseQueryBuilder/{id}', [ProductController::class, 'deleteProductUseQueryBuilder']); // QUERY BUILDER

// ------------------------------------------------------------------------------------------------------------------------


// ----------------------------------------------SELLER--------------------------------------------------------------------
Route::get('/sellers', [SellerController::class, 'showSeller']); // ELOQUENT
Route::post('saveSellerUseEloquent', [SellerController::class, 'saveSellerUseEloquent']); // ELOQUENT
Route::post('editSellerUseEloquent/{id}', [SellerController::class, 'editSellerUseEloquent']); // ELOQUENT
Route::get('deleteSellerUseQueryBuilder/{id}', [SellerController::class, 'deleteSellerUseQueryBuilder']); // QUERY BUILDER
// --------------------------------------------------------------------------------------------------------------------------

// ------------------------------------------CATEGORY------------------------------------------------------------------------
Route::get('/categories', [CategoryController::class, 'showCategory']); // ELOQUENT
Route::post('saveCategoryUseEloquent', [CategoryController::class, 'saveCategoryUseEloquent']); // ELOQUENT
Route::post('editCategoryUseEloquent/{id}', [CategoryController::class, 'editCategoryUseEloquent']); // ELOQUENT
Route::get('deleteCategoryUseQueryBuilder/{id}', [CategoryController::class, 'deleteCategoryUseQueryBuilder']); // QUERY BUILDER
// --------------------------------------------------------------------------------------------------------------------------

// -------------------------------------------PERMISSION---------------------------------------------------------------------
Route::get('/permissions', [PermissionController::class, 'showPermission']); // ELOQUENT
Route::post('savePermissionUseEloquent', [PermissionController::class, 'savePermissionUseEloquent']); // ELOQUENT
Route::post('editPermissionUseEloquent/{id}', [PermissionController::class, 'editPermissionUseEloquent']); // ELOQUENT
Route::get('deletePermissionUseQueryBuilder/{id}', [PermissionController::class, 'deletePermissionUseQueryBuilder']); // QUERY BUILDER
// ----------------------------------------------------------------------------------------------------------------------------

// ----------------------------------------------SELLER PERMISSION------------------------------------------------------------
Route::get('/seller_permission', [SellerPermissionController::class, 'showS_Perm']); // ELOQUENT
Route::post('saveS_PermUseQueryBuilder', [SellerPermissionController::class, 'saveS_PermUseQueryBuilder']); // ELOQUENT
Route::post('editS_PermUseQueryBuilder/{id}', [SellerPermissionController::class, 'editS_PermUseQueryBuilder']); // ELOQUENT
Route::get('deleteS_PermUseQueryBuilder/{id}', [SellerPermissionController::class, 'deleteS_PermUseQueryBuilder']); // QUERY BUILDER
// ----------------------------------------------------------------------------------------------------------------------------