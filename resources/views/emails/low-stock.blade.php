@component('mail::message')
    # Low Stock Alert

    Product {{ $product->name }} has low stock: {{ $product->stock_quantity }} remaining.

    Please restock!

    Thanks,
    {{ config('app.name') }}
@endcomponent
