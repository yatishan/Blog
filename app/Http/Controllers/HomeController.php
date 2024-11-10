<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){

            $user_type=Auth::user()->usertype;

            if($user_type=="user"){
                $posts=Post::all();
                return view('home.homePage',compact('posts'));
            }
            else if($user_type=="admin"){
                return view('admin.index');
            }
            else{
                return redirect()->back();
            }
        }
    }
    public function homePage(){
        $posts=Post::all();
        return view('home.homePage',compact('posts'));
    }

    public function page_details($id){
        $post=Post::find($id);
        return view('home.page_details',compact('post'));
    }

    public function create_post(){
        return view('home.create_post');
    }

    public function add_post(Request $request){
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
        $post->status="pending";
        $post->save();
        return back()->with('success','create post successfully');
    }
}
