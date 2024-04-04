<x-layouts.main>
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        @if ($product->photos->isNotEmpty())
                        <img class="card-img img-fluid" src="/storage/{{ $product->photos->first()->path }}" alt="Card image cap" id="product-detail">
                        @endif
                    </div>
                    <div class="row">
                        <!-- Start Controls -->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!-- End Controls -->
                        <!-- Start Carousel Wrapper -->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!-- Start Slides -->
                            <div class="carousel-inner product-links-wap" role="listbox">
                                <!-- First slide -->
                                <div class="carousel-item active">
                                    <div class="row">
                                        @foreach ($product->photos as $image)
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="/storage/{{ $image->path }}" alt="Product Image 1">
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.First slide -->
                            </div>
                            <!-- End Slides -->
                        </div>
                        <!-- End Carousel Wrapper -->
                        <!-- Start Controls -->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- End Controls -->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $product->category->name }}</h1>
                            <p class="h3 py-2"><b>Price:</b> {{ $product->price }} so'm</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $product->name }}</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>{{ $product->description }}</p>

                            <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                @forelse ($product->specifications as $spec)
                                <li>{{ $spec->attribute_name }} ________________________________ {{ $spec->attribute_value }}</li>
                                @empty
                                <li>No specifications available</li>
                                @endforelse
                            </ul>

                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">

                                    <form action="{{ route('makeOrder') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-success btn-lg">Buy</button>
                                    </form>
                                </div>
                                <div class="col d-grid">
                                    <form action="{{ route('addToCart')}}" method="POST" class="btn btn-success text-white mt-2">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard"><i class="fas fa-cart-plus"></i> Add To Cart</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <section class="py-3">
        <div class="container-sm">
            <h4 class="text-left mb-3">Related Products</h4>
            <div id="carousel-related-product">

            </div>
        </div>
    </section>



</x-layouts.main>