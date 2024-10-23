<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function post(Request $request) {
        $customMessage = [
            'password.required' => 'Password tidak boleh kosong',
            'username.required' => 'username tidak boleh kosong',
        ];
    
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ], $customMessage);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $credentials = $validator->validated();
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/user');
        } else {
            return back()->withErrors([
                'error'=>'username atau password salah',
            ])->withInput(); 
        }
    }

    public function create(Request $request){
        User::create([
            'idUser' => $request->idUser,
            'idLevel' =>$request->idLevel,
            'isActive'=>$request->isActive,
            'password'=>Hash::make($request->password),
            'username'=>$request->username
        ]);
        return redirect()->back();
    }
    

    // public function post(Request $request){
    //     $customMessage = [
    //         'password.required' => 'Password tidak boleh kosong',
    //         'idUser.required' => 'idUser tidak boleh kosong',
    //     ];

    //     $validator = Validator::make($request->all(),[
    //         'idUser'=>'required',
    //         'password'=>'required'
    //     ],$customMessage);

    //     if($validator->fails()){
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $credentials = $validator->validated();

    //     if(Auth::attempt($credentials)){
    //         return redirect()-> intended('/user');
    //     }else{
    //     return back()->withErrors([
    //         'username'=> 'iduser atau password salah'
    //     ]);
    // }
    // }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
