<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::post('/register', [AuthenticatedSessionController::class, 'store'])->name('register');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

Route::get('/men', [ProductController::class, 'indexMen'])->name('men');
Route::get('/women', [ProductController::class, 'indexWomen'])->name('women');
Route::get('/kids', [ProductController::class, 'indexKid'])->name('kid');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/product-details', function () {
    return view('pages.product-details');
})->name('product-details');

require __DIR__ . '/auth.php';
