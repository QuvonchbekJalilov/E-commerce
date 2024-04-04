<!-- Extend the main layout -->
<x-layouts.main>
    <!-- Page content -->
    <div class="container mt-5">
        <h2 class="mb-4">Check Your Order</h2>
        
        <!-- Display orders here -->
        @if($orders->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Created</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>{{ $order->created_at->format('d-M-Y  H:i:s')}}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination links -->
            {{ $orders->links() }}
        @else
            <p>No orders found.</p>
        @endif
    </div>
</x-layouts.main>
