<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtCodeController;
use App\Http\Controllers\ProductController;

// Route untuk halaman home
Route::get('/home', function () {
    return view('home'); // Pastikan 'home' adalah nama file view yang sesuai
})->name('home');

Route::get('/home', [ArtCodeController::class, 'index'])->name('home');

// Redirect ke halaman utama (home) saat mengakses root URL
Route::get('/', function () {
    return redirect()->route('home');
});

// Resource routes untuk ArtCode CRUD
Route::resource('art_codes', ArtCodeController::class);

// Resource routes untuk Product CRUD
Route::resource('product', ProductController::class);
Route::get('/product/{artCode}', [ProductController::class, 'show'])->name('product.show');
Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/products', [ProductController::class, 'index'])->name('products.show');
Route::get('/export-pdf', [ProductController::class, 'exportPdf'])->name('export.pdf');




