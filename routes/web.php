<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Katalog Publik Pengguna
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route khusus Login
Route::middleware(['auth'])->group(function () {
    Route::post('/consultation/send', [ProductController::class, 'sendConsultation'])->name('consultation.send');
    
    // Dashboard & Tambah Produk Admin
    Route::get('/admin/dashboard', [ProductController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('home');
});

require __DIR__.'/auth.php';