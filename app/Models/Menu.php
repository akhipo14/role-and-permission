<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
