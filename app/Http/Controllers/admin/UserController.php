<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        
        $number = 1;
        $users = User::orderByDesc('id')->paginate(10);
        return view('admin.users.index', compact('users', 'number'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'same|password'
        ]);

        $valid['password'] = Hash::make($valid['password']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $valid['password']
        ]);
        $role = Role::findById($request->role);
        $user->assignRole($role->name);

        return redirect()->route('users.index')->with('success', "User created successfully");
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $user = User::findOrFail($user->id);

        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user->id);
        $role = Role::findOrFail($request->role);

        $user->syncRoles($role->name);

        $user->update($request->all());

        return redirect()->route('users.index')->with("success", "User updated successfully");
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully deleted');
    }
}
