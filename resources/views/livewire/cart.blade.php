<div>

    <table class="w-full border-collapse">
        <thead>
        <tr class="border-b">
            <th class="text-left py-4">Product</th>
            <th class="text-center py-4">Quantity</th>
            <th class="text-right py-4">Price</th>
            <th class="text-right py-4">Total</th>
            <th class="py-4"></th>
        </tr>
        </thead>

        <tbody>
        @foreach($items as $item)
            <tr class="border-b">
                <td class="py-4">
                    <div class="flex items-center space-x-4">
                        <img
                            src="{{ $item->product->image }}"
                            alt="{{ $item->product->name }}"
                            class="w-16 h-16 object-cover rounded"
                        >
                        <span>{{ $item->product->name }}</span>
                    </div>
                </td>

                <td class="text-center">
                    <input
                        type="number"
                        wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                        value="{{ $item->quantity }}"
                        min="1"
                        class="w-20 text-center border rounded px-2 py-1"
                    >
                </td>

                <td class="text-right">
                    ${{ number_format($item->product->price, 2) }}
                </td>

                <td class="text-right font-semibold">
                    ${{ number_format($item->quantity * $item->product->price, 2) }}
                </td>

                <td class="text-center">
                    <button
                        type="button"
                        wire:click="removeItem({{ $item->id }})"
                        class="text-red-600 hover:text-red-800"
                    >
                        Remove
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Checkout section --}}
    @if($items->isNotEmpty())
        <div class="mt-6 flex justify-between items-center">
            <div class="text-lg font-semibold">
                Total:
                <span class="text-green-600">
                    ${{ number_format(
                        $items->sum(fn ($item) => $item->quantity * $item->product->price),
                        2
                    ) }}
                </span>
            </div>

            <button
                type="button"
                wire:click="checkout"
                wire:loading.attr="disabled"
                wire:target="checkout"
                class="bg-green-600 hover:bg-green-700 text-white
                       font-semibold px-6 py-3 rounded-lg
                       disabled:bg-gray-400 disabled:cursor-not-allowed"
            >
                <span wire:loading.remove wire:target="checkout">
                    Checkout
                </span>
                <span wire:loading wire:target="checkout">
                    Processing...
                </span>
            </button>
        </div>
    @endif

</div>
