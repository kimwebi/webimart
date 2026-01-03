<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h2>

    <p>Total: ${{ number_format($order->total_price, 2) }}</p>

    <h3 class="mt-6 font-semibold">Items:</h3>
    <ul>
        @foreach($order->items as $item)
            <li>{{ $item->quantity }} x {{ $item->product->name }} - ${{ number_format($item->price, 2) }}</li>
        @endforeach
    </ul>
</div>
