<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.users.indexf');
    }

    public function index()
    {
        return view ('admin.users.index');
        
    }

    public function create(User $user)
    {
        $roles = Role::all();
        return view('admin.users.create', compact('user','roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|max:20|',
            "password_confirmation" => "required|min:8|max:20|same:password"
        ]);

        $user = User::create([
            'name' =>  $request['name'],
            'email' =>  $request['email'],
            'password' => Hash::make( $request['password']),
        ]);

        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.show', $user)->with('success', 'store');
    }
    
    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.users.show', compact('user','roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => "required|email|max:255|unique:users,email,$user->id",
        ]);

        $user->update($request->all());
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.show', $user)->with('success', 'update');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'destroy');
    }

}
