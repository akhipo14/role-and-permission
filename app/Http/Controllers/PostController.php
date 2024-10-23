<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function __construct()
    // {
    //     $this->middleware('permission:view post',['only'=>['index']]);
    //     $this->middleware('permission:add post',['only'=>['store','create']]);
    //     $this->middleware('permission:update post',['only'=>['update','edit']]);
    //     $this->middleware('permission:delete post',['only'=>['destroy']]);
    //     $this->middleware('permission:show all post',['only'=>['destroy','show_all_post_permission']]);
    // } 

    // public function show_all_post_permission(){
    //     $posts = Post::get();
    //     return view('/post.show_all_post',compact('posts'));
    // }

    // public function show_all_post(){
    //     $posts = Post::get();
    //     return view('start',compact('posts'));
    // }
     
    // public function index()
    // {
    //     $user = Auth::user();
    //     $user_id = $user->id;
    //     $posts = Post::where('user_id',$user_id)->get();
    //     return view('post.index',
    //         compact('posts','user')
    //     );
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {   
    //     $user = Auth::user();
    //     $user_id = $user->id;
    //     return view('post.create',compact('user_id'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {   
    //     $user = Auth::user();
    //     $user_id = $user->id;
    //     $request->validate([
    //         'title'=>'required|string|max:255|unique:posts,title',
    //         'desc'=>'required|string',
    //         'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $post = New Post();
    //     $post->title = $request->title;
    //     $post->desc = $request->desc;
    //     $post->user_id = $user_id;

    //     if($request->hasFile('image')){
    //         $image = $request->file('image')->store('public/post');
    //         $post->image = basename($image);
    //     }

    //     $post->save();
    //     return redirect('/post')->with('status','Add Post Success');
        
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Post $post)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Post $post)
    // {
    //     return view('post.edit',compact('post'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Post $post)
    // {
    //     $user = Auth::user();
    //     $user_id = $user->id;
    //     $request->validate([
    //         'title'=>'required|max:255|unique:posts,title,' .$post->id,
    //         'desc'=>'required',
    //         'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $post->title = $request->title;
    //     $post->desc = $request->desc;

    //     if($request->hasFile('image')){
    //         if($post->image){
    //             Storage::delete('public/post/'.$post->image);
    //         }
    //         $image = $request->file('image')->store('public/post');
    //         $post->image = basename($image);
    //     }

    //     $post->save();
    //     return redirect('/post')->with('status','Update Post Success');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Post $post)
    // {
    //     if($post->image){
    //         Storage::delete('public/post/'.$post->image);
    //     }
    //     $post->delete();

    //     return redirect()->back()->with('status','Delete Post Success');

    // }
    
}
