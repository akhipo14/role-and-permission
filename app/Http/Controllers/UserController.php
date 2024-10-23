<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view user',['only'=>['index']]);
    //     $this->middleware('permission:add user',['only'=>['store']]);
    //     $this->middleware('permission:update user',['only'=>['update']]);
    //     $this->middleware('permission:delete user',['only'=>['destroy']]);
    // }

    public function index(){
        // $roles = Role::get();
        // $users = User::get();
        // return view('user.index',compact('roles','users'));
        $menu = Menu::ic_menu();        
        $menu_header = $menu['menu_header'];
        $menu_child = $menu['menu_child'];
        return view('user.index',compact('menu_header','menu_child'));
    }

    // public function store(Request $request){
    //     $request->validate([
    //         'name' => 'required|string|max:255|unique:users,name',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6',
    //         'role' => 'required|string|exists:roles,name',
    //     ]);

    //     $user = User::create([
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'password'=>Hash::make($request->password) ,
    //     ]);

    //     $user->assignRole($request->role);        
    //     return redirect()->back()->with('status','Add User Success');
    // }
    // public function update(Request $request, $id){
    //     $user = User::findOrFail($id);
    //     $request->validate([
    //         'name' => 'required|string|max:255|unique:users,name,'.$user->id,
    //         'email' => 'required|email|unique:users,email,'.$user->id,
    //         'password' => 'min:6',
    //         'role' => 'required|string|exists:roles,name',
    //     ]);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     if($request->password){
    //         $user->password = Hash::make($request->password);
    //     }
    //     $user->save();

    //     $user->syncRoles($request->role);
    //     return redirect()->back()->with('status','Update User Success');
    // }

    // public function destroy($id){
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->back()->with('status','Delete User Success');
    // }
}
