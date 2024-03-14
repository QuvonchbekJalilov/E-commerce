<x-layouts.admin>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">User Add Form</h6>

                    <form method="post" action="{{route('users.update', ["user"=> $user ])}}">
                        @method("PUT")
                        @csrf
                        <div class="raw mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">
                            <label>Role</label>
                            <select class="select2" name="role">
                                <option value="">old Role {{ $user->getRoleNames()}}</option>
                                @foreach ($roles as $role )
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>