<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    $userId=Auth::id();

    $user=User::find($userId);
   
    $posts=$user->posts;
    return view('home',compact('posts'));
   // $posts=$user['posts'];
       // $userId=Auth::id();
        //find all by user id
        //$posts=Post::where('user_id'.$userId);
        //return view('home',compact('posts'));
       

    }
}
