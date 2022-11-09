<?php

use App\Http\Controllers\EcommerceController;
use Illuminate\Support\Facades\Route;

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

Route::any('/ecommerce',[EcommerceController::class,'index'])->name('ecommerce.index');

Route::any('/ecommerce/list',[EcommerceController::class,'index_list'])->name('ecommerce.index_list');
Route::get('/ecommerce/create',[EcommerceController::class,'create'])->name('ecommerce.create');
Route::post('/ecommerce/create',[EcommerceController::class,'store'])->name('ecommerce.store');
Route::get('/ecommerce/{id}/edit',[EcommerceController::class,'edit'])->name('ecommerce.edit');
Route::put('/ecommerce/{id}/edit',[EcommerceController::class,'update'])->name('ecommerce.update');
Route::delete('/ecommerce/{id}',[EcommerceController::class,'destroy'])->name('ecommerce.destroy');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
