<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menu = Menu::where('jenisMenu','header')->get();
        return $menu;
    }
}
