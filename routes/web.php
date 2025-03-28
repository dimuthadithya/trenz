<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

// route for home page 
Route::get('/', function () {
    return view('index');
})->name('home');

// Routes for pages 
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/register', [AuthenticatedSessionController::class, 'store'])->name('register');
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/men', [ProductController::class, 'indexMen'])->name('men');
Route::get('/women', [ProductController::class, 'indexWomen'])->name('women');
Route::get('/kids', [ProductController::class, 'indexKid'])->name('kid');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Routes for Reg User 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout', function () {
        return view('pages.checkout');
    })->name('checkout');


    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});

// Routes for Admin 
Route::middleware(['auth', AdminMiddleware::class])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/admin/view', [AdminDashboardController::class, 'viewAdmins'])->name('admin.view');
    Route::get('/admin/create', [AdminDashboardController::class, 'create'])->name('admin.create');
    Route::get('/products', [AdminProductController::class, 'index'])->name('products');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
});



require __DIR__ . '/auth.php';
