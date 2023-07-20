<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicCOntroller;

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

// rotte di CRUD associate al prodotto
Route::get('/', [PublicCOntroller::class, 'welcome'])->name('homePage');
Route::middleware(['auth'])->group(function(){
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create'); 
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store'); 
    Route::get('product/show/{product}', [ProductController::class, 'show'])->name('product.show'); 
    Route::get('product/user/{user}', [ProductController::class, 'user'])->name('product.user'); 
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit'); 
    Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update'); 
    Route::delete('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy'); 
    // email
    Route::get('contact/us', [PublicCOntroller::class, 'contact'])->name('contact.us'); 
    Route::post('contact/submit', [PublicCOntroller::class, 'submit'])->name('contact.submit'); 
    Route::get('contact/thank/{name}', [PublicCOntroller::class, 'thank'])->name('contact.thank'); 
    // cancellare utente e prodotti associati
    Route::delete('user/destroy', [PublicController::class, 'userDestroy'])->name('user.destroy'); 
    // rotta dei prodotti associati alla categoria
    Route::get('product/category/{category}', [ProductController::class, 'getProductsByCategory'])->name('product.category'); 

}); 
