<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">My Orders</h2>

    @if($orders->isEmpty())
        <p class="text-gray-500">You have no orders yet.</p>
    @else
        <table class="w-full border-collapse">
            <thead>
            <tr class="border-b bg-gray-100">
                <th class="py-3 px-4 text-left">Order ID</th>
                <th class="py-3 px-4 text-left">Date</th>
                <th class="py-3 px-4 text-left">Total</th>
                <th class="py-3 px-4 text-left">Status</th>
                <th class="py-3 px-4">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $order->id }}</td>
                    <td class="py-3 px-4">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    <td class="py-3 px-4 font-semibold">${{ number_format($order->total_price, 2) }}</td>
                    <td class="py-3 px-4">{{ $order->status ?? 'Pending' }}</td>
                    <td class="py-3 px-4">
                        <a href="{{ route('orders.show', $order->id) }}"
                           class="text-blue-950 hover:text-blue-800 font-medium">
                            View
                            <i class="mdi mdi-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
