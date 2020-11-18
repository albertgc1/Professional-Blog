<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');

        $permissions = Permission::pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)]
        ];

        if($request->filled('password')){
            $rules['password'] = ['confirmed', 'min:6'];
        }

        $user->update($request->validate($rules));

        return back()->withFlash('Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        //
    }
}
