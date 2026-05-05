<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //this method is used to show the role page
    public function index()
    {
        $roles = Role::orderby('name','ASC')->paginate(10);
        return view('roles.list', compact('roles'));
    }
//this method is used to show the create role page
    public function create()
    {
        $permissions = Permission::orderby('name','ASC')->get();
        return view('roles.create', compact('permissions'));
    }
//this method is used to store the role in the database
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        // dd($request->permissions);
        $role = Role::create(['name' => $request->name]);
        if(!empty($request->permissions)){
            foreach($request->permissions as $permission){
                $role->givePermissionTo($permission);
            }
            $role->givePermissionTo($request->permissions);
        }

        //redirect to the role page with success message
        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::orderby('name','ASC')->get();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        //validate the request
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        if(!empty($request->permissions)){
            $role->syncPermissions($request->permissions);
        }else{
            $role->syncPermissions([]);
        }

        //redirect to the role page with success message
        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        session()->flash('success', 'Role deleted successfully');

        //redirect to the role page with success message
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }

}
