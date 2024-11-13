<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){

            $user_type=Auth::user()->usertype;

            if($user_type=="user"){
                $posts=Post::where('status','=',"active")->get();
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
        $posts=Post::where('status','=',"active")->get();
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
        Alert::success('Congrats','Added data successfully');
        return back()->with('success','create post successfully');
    }
    public function my_post(){
        $user=Auth::user();
        $user_id=$user->id;
        $datas=Post::where('user_id',"=",$user_id)->get();
        // dd($datas);
        return view('home.my_post',compact('datas'));
    }

    public function my_post_del($id){
        $post=Post::find($id);
        $post->delete();
        return back()->with('success',"your post is successfully deleted");
    }

    public function my_post_update($id){
        $post=Post::find($id);
        return view('home.update_post',compact('post'));
    }

    public function my_post_edit(Request $request,$id){
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
