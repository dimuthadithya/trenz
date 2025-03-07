<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::post('/register', [AuthenticatedSessionController::class, 'store'])->name('register');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

Route::get('/women', function () {
    return view('pages.women');
})->name('women');

Route::get('/men', function () {
    return view('pages.men');
})->name('men');

Route::get('/kids', function () {
    return view('pages.kids');
})->name('kid');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
