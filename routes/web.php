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
    // Get all products for the product section
    $products = Product::latest()->take(20)->get();

    // Get category IDs and counts
    $menCategoryId = Category::where('category_name', 'Men')->pluck('id')->first();
    $kidsCategoryId = Category::where('category_name', 'Kids')->pluck('id')->first();

    $menSubCategoryIds = Category::where('parent_category_id', $menCategoryId)->pluck('id')->toArray();
    $kidsSubCategoryIds = Category::where('parent_category_id', $kidsCategoryId)->pluck('id')->toArray();

    // Get Hot Trend products - newest products
    $hotTrendProducts = Product::latest()->take(3)->get();

    // Get Best Seller products - can be based on order count in a real app
    $bestSellerProducts = Product::withCount('orderItems')
        ->orderBy('order_items_count', 'desc')
        ->take(3)
        ->get();

    // Get Featured products - can be based on rating in a real app
    $featuredProducts = Product::inRandomOrder()->take(3)->get();

    // Get category counts
    $menProductsCount = Product::whereIn('category_id', $menSubCategoryIds)->count();
    $kidsProductsCount = Product::whereIn('category_id', $kidsSubCategoryIds)->count();

    return view('index', compact(
        'products',
        'menProductsCount',
        'kidsProductsCount',
        'hotTrendProducts',
        'bestSellerProducts',
        'featuredProducts'
    ));;
})->name('home');

// Routes for pages 
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/men', [ProductController::class, 'indexMen'])->name('men');
Route::get('/women', [ProductController::class, 'indexWomen'])->name('women');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');




require __DIR__ . '/auth.php';
