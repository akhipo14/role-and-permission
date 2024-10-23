<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test(){
        $user_id = DB::table('ic_user')->pluck('idUser');
        $users_validate = DB::table('tbluser')->where('idUser',$user_id)->first();
        $user_password = $users_validate->password;
        $user_username = $users_validate->username;
        $test ='$2a$10$XR/S5MrG6iG4Xw6yoHxgC.7/RYN.vo2xu0/ai7kAYxFGLMJXLSotq';

        $menu_header = Menu::where('jenisMenu','header')->where('isActive',1)->get();
        $menu_child = Menu::where('jenisMenu','child')->where('isActive',1)->get();
        // $menus[] = '';
        // foreach($menu_header as $menu){
        //     $menus[] = $menu->childMenu;
        // }
        // dd($menus);
        return view('/test',compact('menu_header','menu_child'));
    }

    public function menu(){
        $menu = Menu::where('jenisMenu','header')->get();
        return $menu;
    }
}
