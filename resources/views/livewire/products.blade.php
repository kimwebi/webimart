<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
            <div class="aspect-square relative h-10 w-10">
                <img src="{{ $product->image ?? asset('images/icon.png') }}" alt="{{ $product->name }}" class="w-full h-full object-cover">

            </div>
            <div class="p-4">
                <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 mb-2">
                    <span class="text-2xl font-bold text-green-600">{{ number_format($product->price, 2) }}</span>
                </p>
                <p class="text-sm text-gray-500 mb-4">
                    Stock: {{ $product->stock_quantity }}
                </p>
                <button
                    type="button"
                    wire:click="addToCart({{ $product->id }})"
                    wire:loading.attr="disabled"
                    wire:target="addToCart"
                    class="w-full bg-blue-600 ...">
                    <span wire:loading.remove wire:target="addToCart">Add to Cart</span>

                    <span wire:loading wire:target="addToCart">Adding...</span>
                </button>
            </div>
        </div>

    @endforeach
</div>
