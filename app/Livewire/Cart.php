<?php

namespace App\Livewire;

use App\Jobs\CheckLowStock;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use function Symfony\Component\String\b;

class Cart extends Component
{
    public function updateQuantity($itemId, $quantity)
    {
        $item = CartItem::findorFail($itemId);
        if($quantity < 1 ) $item->delete();
        else $item->update(['quantity' => $quantity]);

    }
    public function removeItem($itemId)
    {
       CartItem::findOrFail($itemId)->delete();
    }
    public function checkout()
    {
        $user = auth()->user();
        $items = $user->cartItems()->with('product')->get();

        if ($items->isEmpty()) {
            $this->dispatch(
                'notify',
                type: 'error',
                message: 'Your cart is empty.'
            );
            return;
        }

        //Calculate the price of the number of items added to cart
        $total = $items->sum(fn ($item) => $item->quantity * $item->product->price);

        $order = Order::create([
            'user_id' => $user->id,
            'total_price'   => $total,
        ]);

        foreach ($items as $item) {
            $product = $item->product;

            if ($product->stock_quantity < $item->quantity) {
                continue;
            }

            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $product->id,
                'quantity'   => $item->quantity,
                'price'      => $product->price,
            ]);

            $product->decrement('stock_quantity', $item->quantity);
            if ($product->stock_quantity < 5) {
                CheckLowStock::dispatch($product);
            }
            $item->delete();
        }

        $this->dispatch(
            'notify',
            type: 'success',
            message: 'Order placed successfully!'
        );

        return $this->redirectRoute('orders.show', $order->id);
    }
    public function render()
    {
        $items = auth()->user()?->cartItems()->with('product')->get() ?? collect();

        return view('livewire.cart', compact('items'))
            ->layout('layouts.app');
    }
}
