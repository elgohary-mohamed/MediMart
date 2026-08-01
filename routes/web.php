<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\wishlistController;

Route::get('/', function () {
    return view('welcome');
});






Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/search', [ProductController::class, 'search']);
Route::get('/product', [ProductController::class, 'show_product']);
Route::get('/addproduct', [ProductController::class, 'index']);
Route::post('/addproduct', [ProductController::class, 'store']);
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/quickproduct/{id}', [ProductController::class, 'quick_show']);

Route::get('/addcategory', [CategoryController::class, 'index']);
Route::post('/addcategory', [CategoryController::class, 'store']);

Route::get('/addsubcategory', [CategoryController::class, 'index_subcategory']);
Route::post('/addsubcategory', [CategoryController::class, 'store_subcategory']);

Route::get('/addbrand', [brandController::class, 'index']);
Route::post('/addbrand', [brandController::class, 'store']);


Route::get('/addsection', [SectionController::class, 'index']);
Route::post('/addsection', [SectionController::class, 'store']);


Route::get('/wishlist', [wishlistController::class, 'index'])->middleware('auth');
Route::post('/wishlist', [wishlistController::class, 'store'])->middleware('auth');

Route::get('/offer', [OfferController::class, 'offer']);
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart', [CartController::class, 'store'])->middleware('auth');
Route::post('/cart/increase', [CartController::class, 'increase'])->middleware('auth');
Route::post('/cart/decrease', [CartController::class, 'decrease'])->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
