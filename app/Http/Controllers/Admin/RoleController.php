<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.roles.index');
    }

    public function index()
    {
        $roles = Role::all();
        return view ('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view ('admin.roles.create' , compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //dd($request->permissions);
        $request->validate([
            'name' => 'required|unique:roles',
        ]);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.show', $role)->with('success', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view ('admin.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view ('admin.roles.edit',compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        

        //dd($request->permissions);

        $request->validate([
            'name' => "required|unique:roles,name,$role->id",
        ]);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.show', $role)->with('success', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'El rol se eliminó con éxito');
    }
}
