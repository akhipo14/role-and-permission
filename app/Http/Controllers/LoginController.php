<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function post(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $username = $request->username;
        $password = $request->password;
        $valid_user = User::where('username',$username)
        ->first();
        // $valid_user = DB::table('tbluser')->where('username',$username)
        // ->where('password',$password)->first();

        if(!$valid_user){
            return back()->withErrors([
                'error'=> 'username belum terdaftar'
            ]);
        }
        // $password_user = $valid_user->password;
        // if($request->password === $password_user){
        //     dd('password sama');
        // }
        // else{
        //     dd('password tdk sama');
        // }
        $valid_ic_user = DB::table('ic_user')->where('idUser',$valid_user->idUser)->first();
        if($valid_ic_user  && $valid_user->password === $request->password){
            // if(Auth::attempt(['username' =>$request->username,'password'=>$request->password])){
            //     $user = Auth::user();
            //     $token = $valid_ic_user->createToken('Auth')->plainTextToken;
            //     return redirect()->intended('/user',compact('valid_ic_user','token'));
            // }

            Auth::login($valid_user);
            return redirect()->intended('/user');

        }
        return back()->withErrors([
            'username'=> 'email atau password salah'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
