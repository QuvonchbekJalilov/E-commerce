<x-layouts.admin>

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Product Update</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>

                    <form method="post" action="{{ route('products.update', ['product'=> $product->id])}}" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" class="form-control" name="description" placeholder="Description">{{$product->description}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category" id="category" aria-label="Floating label select example">
                                <option selected>Choose a category</option>
                                @foreach ($categories as $category )
                                <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="{{ $product->price }}" name="price" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Price</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="{{ $product->stock }}" name="stock" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Stock</label>
                        </div>

                        <div class="mb-3">
                            @foreach($product->photos as $photo)
                            <div id="photo_{{ $photo->id }}" style="position: relative; display: inline-block; margin-right: 10px;">
                                <img src="/storage/{{ $photo->path }}" alt="Product Photo" width="100">
                                <button type="button" onclick="deletePhoto('{{ $photo->id }}')" style="position: absolute; top: 5px; right: 5px; background: none; border: red; padding: 0; cursor: pointer;">
                                    <i class="fa fa-trash" style="font-size: 14px;"></i> <!-- Use an appropriate trash icon -->
                                </button>
                            </div>
                            @endforeach
                            <label for="formFileMultiple" class="form-label">Upload Photos</label>
                            <input class="form-control" name="photos[]" type="file" id="formFileMultiple" multiple>
                        </div>


                        <div class="mb-3">
                            <label for="specification" class="form-label">Specifications</label>
                            <div id="specifications">
                                @if($product->specifications->isNotEmpty())
                                @foreach ($product->specifications as $index => $specification)
                                <div class="input-group mb-3 specification-item">
                                    <input type="text" class="form-control" name="specifications[{{ $index }}][attribute_name]" value="{{ $specification->attribute_name }}" placeholder="Attribute Name">
                                    <input type="text" class="form-control" name="specifications[{{ $index }}][attribute_value]" value="{{ $specification->attribute_value }}" placeholder="Attribute Value">
                                    <button type="button" class="btn btn-danger delete-specification">Delete</button>
                                </div>
                                @endforeach
                                @else
                                <div class="input-group mb-3 specification-item">
                                    <input type="text" class="form-control" name="specifications[][attribute_name]" placeholder="Attribute Name">
                                    <input type="text" class="form-control" name="specifications[][attribute_value]" placeholder="Attribute Value">
                                    <button type="button" class="btn btn-danger delete-specification">Delete</button>
                                </div>
                                @endif
                            </div>
                            <button type="button" id="addSpecification" class="btn btn-sm btn-primary">Add Specification</button>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layouts.admin>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addSpecificationBtn = document.getElementById('addSpecification');
        const specificationsContainer = document.getElementById('specifications');

        addSpecificationBtn.addEventListener('click', function() {
            const specificationItem = document.createElement('div');
            specificationItem.classList.add('input-group', 'mb-3', 'specification-item');
            specificationItem.innerHTML = `
                <input type="text" class="form-control" name="specifications[][attribute_name]" placeholder="Attribute Name">
                <input type="text" class="form-control" name="specifications[][attribute_value]" placeholder="Attribute Value">
                <button type="button" class="btn btn-danger delete-specification">Delete</button>
            `;
            specificationsContainer.appendChild(specificationItem);
        });

        specificationsContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-specification')) {
                event.target.parentElement.remove();
            }
        });
    });

    
</script>