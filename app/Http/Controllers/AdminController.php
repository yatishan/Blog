<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page(){
        return view('admin.post_page');
    }

    public function post_add(Request $request){
        $user=Auth::user();
        $user_type=$user->usertype;
        $user_id=$user->id;
        $name=$user->name;
        $valide=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required'
        ]);
        $post=new Post();
        $post->title=$request->title;
        $post->description=$request->description;
        $file=$request->file('image');
        if($file){
            $filename=time().".".$file->getClientOriginalExtension();
            $file->storeAs('images',$filename,'public');
            $post->image=$filename;
        }
        $post->user_id=$user_id;
        $post->user_type=$user_type;
        $post->name=$name;
        $post->status="active";
        $post->save();
        return back()->with('success','create post successfully');

    }

    public function show_page(){
        $posts=Post::all();
        return view('admin.show_page',compact('posts'));
    }

    public function delete_page($id){
        $post=Post::find($id);
        $post->delete();
        return back()->with('success','deleted successfully');
    }

    public function edit_page($id){
        $post=Post::find($id);
        return view('admin.edit_page',compact('post'));
    }

    public function update_page(Request $request ,$id){
        $post=Post::find($id);
        $valide=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        $post->title=$request->title;
        $post->description=$request->description;
        $file=$request->file('image');
        if($file){
            $filename=time().".".$file->getClientOriginalExtension();
            $file->storeAs('images',$filename,'public');
            $post->image=$filename;
        }
        $post->save();
        return back()->with('success','updated successfully');
    }
}

