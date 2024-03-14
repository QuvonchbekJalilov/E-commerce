<x-layouts.admin>

    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Products Table</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
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
            <a href="{{ route('products.create') }}" class="btn btn-success rounded-pill m-2">Create product</a>
            <form class="d-none d-md-flex ms-md-4">

                <div class="col-md-6">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </div>
            </form>

            <table class="table table-striped" id="products-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Category</th>
                        <th scope="col">@sortablelink('name')</th>
                        <th scope="col">@sortablelink('price')</th>
                        <th scope="col">Image</th>
                        <th scope="col">Control</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{$number++}}</th>
                        <th scope="row">{{ $product->category->name}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            @foreach($product->photos as $photo)
                            <img src="/storage/{{ $photo->path }}" alt="Product Photo" width="100" height="100">
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('products.show', ['product' => $product->id ])}}" class="btn btn-square btn-outline-success m-2"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route("products.edit", ['product' => $product->id])}}" class="btn btn-square btn-outline-primary m-2"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form method="post" action="{{ route('products.destroy', ['product' => $product->id])}}" onsubmit="return confirm('Are you sure you wish to delete?');">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-square btn-outline-danger m-2"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $products->links()}}
        </div>
    </div>


</x-layouts.admin>