<x-layouts.admin>

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Order Update</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>

                    <form method="post" action="{{ route('orders.update', ['order'=> $order->id])}}" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" name="name" value="{{$order->user_id}}" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">product name</label>
                            <input id="description" class="form-control" name="product_id" placeholder="Description" value="{{$order->product_id}}">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" value="{{ $order->phone_number}}">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="{{ $order->total_amount }}" name="sum" id="floatingPassword" placeholder="total sum">
                            <label for="floatingPassword">Sum</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="{{ $order->status }}" name="status" id="floatingPassword" placeholder="status">
                            <label for="floatingPassword">Status</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="{{ $order->quantity }}" name="quantity" id="floatingPassword" placeholder="status">
                            <label for="floatingPassword">Quantity</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layouts.admin>

