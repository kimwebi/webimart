<?php

use App\Livewire\Cart;
use App\Livewire\OrderShow;
use App\Livewire\OrdersList;
use App\Livewire\ProductList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/products', ProductList::class)->name('products');
    Route::get('/cart', Cart::class)->name('cart');
    Route::get('/orders', OrdersList::class)->name('orders.list');
    Route::get('/orders/{order}', OrderShow::class)->name('orders.show');
});
