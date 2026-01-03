@component('mail::message')
    # Low Stock Alert

    Product {{ $product->name }} has low stock: {{ $product->stock_quantity }} remaining.

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
