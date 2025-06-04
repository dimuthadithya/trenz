<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

// route for home page 
Route::get('/', function () {
    $products = Product::all()->take(20);

    $menCategoryId = Category::where('category_name', 'Men')->pluck('id')->toArray();
    $menSubCategoryIds = Category::where('parent_category_id', $menCategoryId)->pluck('id')->toArray();

    $kidsCategoryId = Category::where('category_name', 'Kids')->pluck('id')->toArray();
    $kidsSubCategoryIds = Category::where('parent_category_id', $kidsCategoryId)->pluck('id')->toArray();

    $menProductsCount = $products->whereIn('category_id', $menSubCategoryIds)->count();
    $kidsProductsCount = $products->whereIn('category_id', $kidsSubCategoryIds)->count();



    return view('index', compact('menProductsCount', 'kidsProductsCount', 'products'));;
})->name('home');

// Routes for pages 
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/register', [AuthenticatedSessionController::class, 'store'])->name('register');
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/men', [ProductController::class, 'indexMen'])->name('men');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/women', [ProductController::class, 'indexWomen'])->name('women');
Route::get('/kids', [ProductController::class, 'indexKid'])->name('kid');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Routes for Reg User 
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/address', [ProfileController::class, 'address'])->name('profile.address');
    Route::post('/profile/address', [ProfileController::class, 'storeAddress'])->name('profile.address.store');
    Route::get('/profile/payments', [ProfileController::class, 'payments'])->name('profile.payments');
    Route::post('/profile/payments', [ProfileController::class, 'storePayment'])->name('profile.payments.store');
    Route::delete('/profile/payments/{id}', [ProfileController::class, 'deletePayment'])->name('profile.payments.delete');
    Route::post('/profile/payments/{id}/default', [ProfileController::class, 'setDefaultPayment'])->name('profile.payments.default');
    Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::post('/profile/orders/{order}/cancel', [ProfileController::class, 'cancelOrder'])->name('profile.orders.cancel');

    Route::get('/profile/cancellations', [ProfileController::class, 'cancellations'])->name('profile.cancellations');
    Route::get('/profile/reviews', [ProfileController::class, 'reviews'])->name('profile.reviews');
    Route::get('/profile/wishlist', [ProfileController::class, 'wishlist'])->name('profile.wishlist');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout',  [OrderController::class, 'index'])->name('checkout');
    Route::post('/checkout',  [OrderController::class, 'create'])->name('order.create');


    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/create', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.remove');
});



require __DIR__ . '/auth.php';
