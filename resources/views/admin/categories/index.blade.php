<x-layouts.admin>
    <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Categories Table</h6>
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <a href="{{route('categories.create')}}" class="btn btn-success rounded-pill m-2">Create category</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created at</th>
                        <th scope="col">control</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$number++}}</th>
                        
                        <td>{{$category->name}}</td>
                        <th scope="row">{{ $category->created_at}}</th>
                        <td>
                            <a href="" class="btn btn-square btn-outline-success m-2"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route("categories.edit", ['category' => $category->id])}}" class="btn btn-square btn-outline-primary m-2"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form method="post" action="{{ route('categories.destroy', ['category' => $category->id])}}" onsubmit="return confirm('Are you sure you wish to delete?');">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-square btn-outline-danger m-2"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>