<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view permission',['only'=>['index']]);
        $this->middleware('permission:add permission',['only'=>['store']]);
        $this->middleware('permission:update permission',['only'=>['update']]);
        $this->middleware('permission:delete permission',['only'=>['delete']]);
    }

    public function index(){
        $except_permissions = ['view role','view permission','view user','update permission to role','view post'];
        $permissions = Permission::whereNotIn('name',$except_permissions)->get();
        return view('permission.index',compact('permissions'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255|unique:permissions,name'
        ]);

        Permission::create(['name'=>$request->name]);

        return redirect()->back()->with('status','Add Permission Succes');
    }

    public function update(Request $request,$id){
        $permission = Permission::findOrFail($id);
        $request->validate([
            'name'=>'required|string|max:255|unique:permissions,name,'.$permission->id,
        ]);

        $permission->update(['name'=>$request->name]);

        return redirect()->back()->with('status','Update Permission Success');
    }

    public function destroy($id){
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->back()->with('status','Delete permission Success');
    }

}
