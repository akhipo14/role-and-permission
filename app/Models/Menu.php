<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'ic_menu';
    protected $primaryKey = 'idMenu';
    protected $guarded =[];

    public function childMenu(){
        return $this->hasMany(Menu::class,'headerMenu');
    }
    public function parentMenu(){
        return $this->belongsTo(Menu::class,'headerMenu');
    }

    public static function ic_menu(){
        // $user_id = DB::table('ic_user')->pluck('idUser');
        // $users_validate = DB::table('tbluser')->where('idUser',$user_id)->first();
        // $user_password = $users_validate->password;
        // $user_username = $users_validate->username;
        // $id = '2015.0077';
        // $test ='$2a$10$XR/S5MrG6iG4Xw6yoHxgC.7/RYN.vo2xu0/ai7kAYxFGLMJXLSotq';

        $menu_header = Menu::where('jenisMenu','header')->where('isActive',1)->get();
        $menu_child = Menu::where('jenisMenu','child')->where('isActive',1)->get();
        // $menus[] = '';
        // foreach($menu_header as $menu){
        //     $menus[] = $menu->childMenu;
        // }
        // dd($menus);
        return [
            'menu_header'=>$menu_header,
            'menu_child'=>$menu_child
        ];
    }

}
