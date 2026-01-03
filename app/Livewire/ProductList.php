<?php

namespace App\Livewire;

use App\Models\CartItem;
use App\Models\Product;
//use DB;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductList extends Component
{
    public function addToCart($productId) {
        $user = auth()->user();
        if (!auth()->check()) {
            $this->dispatch(
                'notify',
                type: 'error',
                message: 'Access denied. Please login first.'
            );
            return;
        }


        $product = Product::findOrFail($productId);
        if ($product->stock_quantity < 1) {
            $this->dispatch(
                'notify',
                type: 'error',
                message: 'This product is out of stock!'
            );
            return;
        }

        $cartItem = CartItem::firstOrCreate(
            ['user_id' => $user->id, 'product_id' => $productId],
            ['quantity' => 0]
        );

        $cartItem->increment('quantity');
        // Show success notification
        $this->dispatch(
            'notify',
            type: 'success',
            message: "Added {$product->name} successfully to cart"
        );
    }
    public function render()
    {
        return view('livewire.products', ['products' => Product::all(),
            ])->layout('layouts.app');
    }
}
