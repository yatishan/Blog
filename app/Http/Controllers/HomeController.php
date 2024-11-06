<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){

            $user_type=Auth::user()->usertype;

            if($user_type=="user"){
                return view('home.homePage');
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
        return view('home.homePage');
    }
}
