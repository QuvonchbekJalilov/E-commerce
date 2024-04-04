<x-layouts.admin>

    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Orders Table</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <a href="{{ route('orders.create') }}" class="btn btn-success rounded-pill m-2">Create order</a>
            <form class="d-none d-md-flex ms-md-4">
                <div class="col-md-6">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </div>
            </form>

            <table class="table table-striped" id="products-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">user id</th>
                        <th scope="col">product id</th>
                        <th scope="col">phone number</th>
                        <th scope="col">quantity</th>
                        <th scope="col">sum</th>
                        <th scope="col">status</th>
                        <th scope="col">time</th>
                        <th scope="col">Control</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{$number++}}</th>
                        <th scope="row">{{ $order->user->name}}</th>
                        <td>{{$order->product_id}}</td>
                        <td>{{$order->phone_number}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->total_amount}}</td>
                        <td>
                            @if ($order->status == "New Order")
                                <p style="color: green;">{{ $order->status}}</p>
                            @elseif ($order->status == "Yetkazilmoqda")
                                <p style="color: yellow;">{{ $order->status }}</p>
                            @endif
                        </td>
                        <td>
                            {{ $order->created_at}}
                        </td>
                        <td>
                            <a href="{{ route("orders.edit", ['order' => $order->id])}}" class="btn btn-square btn-outline-primary m-2"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form method="post" action="{{ route('orders.destroy', ['order' => $order->id])}}" onsubmit="return confirm('Are you sure you wish to delete?');">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-square btn-outline-danger m-2"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links()}}
        </div>
    </div>


</x-layouts.admin>