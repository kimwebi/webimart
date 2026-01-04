<div class="w-full p-5">
    <div class="block md:table w-full border-collapse">
        <div class="hidden md:table-header-group">
            <div class="table-row border-b">
                <div class="table-cell text-left py-3 font-medium">Product</div>
                <div class="table-cell text-center py-3 font-medium">Qty</div>
                <div class="table-cell text-right py-3 font-medium">Price</div>
                <div class="table-cell text-right py-3 font-medium">Total</div>
                <div class="table-cell py-3"></div>
            </div>
        </div>

        <div class="block md:table-row-group">
            @foreach($items as $item)
                <!-- Mobile: stacked card-like row -->
                <div class="block md:table-row border-b last:border-b-0">
                    <!-- Product column -->
                    <div class="flex flex-col md:table-cell md:py-3 py-4 border-b md:border-b-0">
                        <span class="md:hidden font-medium text-sm text-gray-600 mb-2">Product</span>
                        <div class="flex items-center gap-3">
                            <img src="{{ $item->product->image }}"
                                 alt="{{ $item->product->name }}"
                                 class="w-12 h-12 object-cover rounded flex-shrink-0">
                            <span class="text-sm md:text-base">{{ $item->product->name }}</span>
                        </div>
                    </div>

                    <!-- Quantity column -->
                    <div class="flex flex-col md:table-cell md:text-center py-4 border-b md:border-b-0">
                        <span class="md:hidden font-medium text-sm text-gray-600 mb-2">Quantity</span>
                        <input type="number"
                               wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                               value="{{ $item->quantity }}"
                               min="1"
                               class="w-20 mx-auto text-center border rounded px-2 py-1 text-sm">
                    </div>

                    <!-- Price column -->
                    <div class="flex flex-col md:table-cell md:text-right py-4 border-b md:border-b-0">
                        <span class="md:hidden font-medium text-sm text-gray-600 mb-2">Price</span>
                        <span class="text-sm md:text-base">${{ number_format($item->product->price, 2) }}</span>
                    </div>

                    <!-- Total column -->
                    <div class="flex flex-col md:table-cell md:text-right md:font-semibold py-4 border-b md:border-b-0">
                        <span class="md:hidden font-medium text-sm text-gray-600 mb-2">Total</span>
                        <span class="text-sm md:text-base font-semibold">
            ${{ number_format($item->quantity * $item->product->price, 2) }}
          </span>
                    </div>

                    <!-- Remove column -->
                    <div class="flex flex-col md:table-cell md:text-center py-4">
                        <span class="md:hidden font-medium text-sm text-gray-600 mb-2">Action</span>
                        <button type="button"
                                wire:click="removeItem({{ $item->id }})"
                                class="text-red-600 hover:text-red-800 text-sm">
                            <i class="mdi mdi-cart-remove"></i>
                            Remove
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Checkout section --}}
    @if($items->isNotEmpty())
        <div class="mt-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="text-lg font-semibold">
                Total: <span class="text-purple-600">
        ${{ number_format($items->sum(fn ($item) => $item->quantity * $item->product->price), 2) }}
      </span>
            </div>
            <button type="button"
                    wire:click="checkout"
                    wire:loading.attr="disabled"
                    wire:target="checkout"
                    class="bg-purple-600 hover:bg-purple-400 text-white font-semibold px-6 py-3 rounded-lg disabled:bg-gray-400 disabled:cursor-not-allowed w-full sm:w-auto text-center">
                <span wire:loading.remove wire:target="checkout"> <i class="mdi mdi-cart-variant"></i> Checkout</span>
                <span wire:loading wire:target="checkout">Processing...</span>
            </button>
        </div>
    @endif
</div>
