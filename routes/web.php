<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\pages;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[pages::class,'homepage']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//Route::get('/redirect',[pages::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   Route:: get('/dashboard',[pages::class,'redirect'])->name('dashboard');
});


Route::get('/product_details/{id}',[pages::class,'product_details']);

Route::get('/allproducts',[pages::class,'view_all_products']);

Route::post('/add_to_cart/{id}',[pages::class,'add_to_cart']);

Route::get('/showcart',[pages::class,'showcart']);

Route::get('/delete_cart/{id}',[pages::class,'delete_cart']);

Route::get('/cash_order',[pages::class,'cash_order']);

// Admins routes 
// add category route 

Route::get('/addcategory',[AdminController::class,'showcategory']);

Route::post('/add_categories',[AdminController::class,'add_category']);

Route::get('/delete_category/{id}', [AdminController::class,'delete_category']);


// product routes
Route::get('/add_products',[AdminController::class,'add_products']);

Route::post('/add_products',[AdminController::class,'add_productintable']);

Route::get('/show_products',[AdminController::class,'show_products']);

Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

Route::get('/update_product/{id}',[AdminController::class,'update_product']);

Route::post('/updated_products/{id}',[AdminController::class,'posted_updated_products']);


Route::get('/order',[AdminController::class,'order']);

Route::get('/delivered/{id}',[AdminController::class,'delivered']);

Route::get('/send_email/{id}',[AdminController::class,'send_email']);