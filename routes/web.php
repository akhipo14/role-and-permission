<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('test');
// });

Route::group(['middleware'=>'auth'], function(){
    Route::get('/user',[UserController::class,'index'])->name('user');
    Route::post('/user',[UserController::class,'store'])->name('user.store');
    Route::put('/user/{id}',[UserController::class,'update'])->name('user.update');
    Route::delete('/user/{id}',[UserController::class,'destroy'])->name('user.destroy');
    
    // roles
    Route::get('/role',[RoleController::class,'index'])->name('role');
    Route::post('/role',[RoleController::class,'store'])->name('role.store');
    Route::put('/role/{id}',[RoleController::class,'update'])->name('role.update');
    Route::delete('/role/{id}',[RoleController::class,'destroy'])->name('role.destroy');
    Route::put('/role/{id}/permission',[RoleController::class,'addPermissionToRole'])->name('updatepermission');
    
    // permission
    Route::get('/permission',[PermissionController::class,'index'])->name('permission');
    Route::post('/permission',[PermissionController::class,'store'])->name('permission.store');
    Route::put('/permission/{id}',[PermissionController::class,'update'])->name('permission.update');
    Route::delete('/permission/{id}',[PermissionController::class,'destroy'])->name('permission.destroy');
    
    Route::get('/post',[PostController::class,'index'])->name('post');
    Route::get('/post/all_post',[PostController::class,'show_all_post_permission'])->name('show_all_post');
    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
    Route::post('/post/create',[PostController::class,'store'])->name('post.store');
    Route::get('/post/{post}/edit',[PostController::class,'edit'])->name('post.edit');
    Route::put('/post/{post}/edit',[PostController::class,'update'])->name('post.update');
    Route::delete('/post/{post}',[PostController::class,'destroy'])->name('post.destroy');
});

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'post'])->middleware('guest');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

// post
Route::get('/',[PostController::class,'show_all_post']);