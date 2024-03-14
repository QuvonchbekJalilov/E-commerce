<x-layouts.admin>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Product Add</h6>
                    <form method="post" action="{{ route('products.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInput">
                            <label for="floatingInput">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="description" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="category" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Open this select menu</option>
                                @foreach ($categories as $category )
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Works with selects</label>
                        </div>
                        <div class="mb-3">
                            <label for="specifications" class="form-label">Specifications</label>
                            <div id="specifications"></div>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addSpecification()">Add Specification</button>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="price" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Price</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="stock" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Stock</label>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Multiple files input</label>
                            <input class="form-control" name="photos[]" type="file" id="formFileMultiple" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addSpecification() {
            var container = document.getElementById('specifications');
            var specificationGroup = document.createElement('div');
            specificationGroup.classList.add('input-group', 'mb-3');

            var inputName = document.createElement('input');
            inputName.setAttribute('type', 'text');
            inputName.setAttribute('name', 'specifications[][attribute_name]');
            inputName.setAttribute('placeholder', 'Attribute Name');
            inputName.classList.add('form-control');

            var inputValue = document.createElement('input');
            inputValue.setAttribute('type', 'text');
            inputValue.setAttribute('name', 'specifications[][attribute_value]');
            inputValue.setAttribute('placeholder', 'Attribute Value');
            inputValue.classList.add('form-control');

            var deleteButton = document.createElement('button');
            deleteButton.setAttribute('type', 'button');
            deleteButton.classList.add('btn', 'btn-danger');
            deleteButton.innerHTML = 'Delete';
            deleteButton.addEventListener('click', function() {
                specificationGroup.remove();
            });

            specificationGroup.appendChild(inputName);
            specificationGroup.appendChild(inputValue);
            specificationGroup.appendChild(deleteButton);

            container.appendChild(specificationGroup);
        }
    </script>
</x-layouts.admin>
