<x-layouts.admin>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Product Details</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show</li>
                </ol>
            </nav>
            <!-- Product Information -->
            <div class="row">
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-4">Name:</dt>
                        <dd class="col-sm-8">{{ $product->name }}</dd>

                        <dt class="col-sm-4">Price:</dt>
                        <dd class="col-sm-8">{{ $product->price }}</dd>

                        <dt class="col-sm-4">Category:</dt>
                        <dd class="col-sm-8">{{ $product->category->name }}</dd>

                        <dt class="col-sm-4">Stock:</dt>
                        <dd class="col-sm-8">{{ $product->stock }}</dd>

                        <dt class="col-sm-4">Description:</dt>
                        <dd class="col-sm-8">{{ $product->description }}</dd>

                        <dt class="col-sm-8">Specification:</dt>
                        @foreach ($product->specifications as $spec )
                        <dd class="col-sm-8">{{$spec->attribute_name}} ________________________ {{$spec->attribute_value}}</dd>
                        @endforeach

                    </dl>
                </div>
                <div class="col-md-6">
                    <!-- Display product images -->
                    <h6>Product Images:</h6>
                    @foreach($product->photos as $photo)
                    <img src="/storage/{{ $photo->path }}" alt="Product Photo" width="100">
                    @endforeach
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>
    </div>
</x-layouts.admin>