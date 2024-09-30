<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role',['only'=>['index']]);
        $this->middleware('permission:add role',['only'=>['store']]);
        $this->middleware('permission:update role',['only'=>['update']]);
        $this->middleware('permission:delete role',['only'=>['destroy']]);
        $this->middleware('permission:update permission to role',['only'=>['addPermissionToRole']]);
    }


    public function index(){
        $permission = Permission::get();        
        $roles = Role::get();
        return view('role.index',compact('roles','permission'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255|unique:permissions,name',
        ]);

        Role::create(['name'=>$request->name]);

        return redirect()->back()->with('status','Add Role Success');
    }

    public function update(Request $request,$id){
        $role = Role::findOrFail($id);
        $request->validate([
            'name'=>'required|string|max:255|unique:permissions,name,'.$role->id,
        ]);

        $role->update(['name'=>$request->name]);

        return redirect()->back()->with('status','Update Role Success');
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();
        
        return redirect()->back()->with('status','Delete Role Success');
    }

    public function addPermissionToRole(Request $request,$id){
        $role = Role::findOrFail($id);
        $request->validate([
            'permissions'=>'required',
        ]);
        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('status','update Permission Success');
    }

}
