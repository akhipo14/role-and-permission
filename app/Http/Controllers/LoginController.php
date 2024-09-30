<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function post(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            if($user->hasAnyPermission('add user','view user','update user','delete user')){
            return redirect()->intended('/user');
            }
            else if($user->hasAnyPermission('add role','view role','update role','delete role')){
                return redirect()->intended('/role');
            }
            else if($user->hasAnyPermission('add permission','view permission','update permission','delete permission')){
                return redirect()->intended('/permission');
            }
            else if($user->hasAnyPermission('add post','view post','update post','delete post')){
                return redirect()->intended('/post');
            }
            else{
                return redirect()->intended('/');
            }
            
            
        }

        return back()->withErrors([
            'email'=> 'email atau password salah'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
