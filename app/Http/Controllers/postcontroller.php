<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Image;
class postcontroller extends Controller
{




      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        //هكتب ده لو عايزه كل حاجه في الكنترولر ده متتعملشي الا لما الشخص يعمل لوجن
       // $this->middleware('auth');
       //only
       //$this->middleware('auth',['only'=>['show']]);
      //except
       $this->middleware('auth',['except'=>['index','show']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return Post::all();
        //$posts=Post::orderBy('created_at','ASC')->get();
        //return $posts;
        $posts=Post::orderBy('created_at','ASC')->paginate(10);
        $tags=Tag::all();

        return view('posts.index',compact('posts','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags=Tag::all();
        return view('posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$posttitle = $request->input('tilte');
       // return $posttitle;
       //currentuser
       $user=Auth::user();
       $request->validate(['title'=>'bail|required|min:3','body'=>'required','photo'=>'image|mimes:jpeg,png,jpg|max:2048']);
       $post=new Post();
       $post->title=$request->input('title');
       $post->body=$request->input('body');
       $now=date('YmdHis');
       $post->slug=str_replace(' ','-',strtolower($post->title)).'-'.$now;
       $post->user_id=$user->id;
       
       if($request->hasFile('photo')){
           $photo=$request->photo;
           $filename=time().'-'.$photo->getClientOriginalName();
           $location=public_path('images/posts/'.$filename);
           Image::make($photo)->resize(800,400)->save($location);
           $post->photo=$filename;
       }


       $post->save();

       $post->tags()->sync($request->tags);
       return redirect('/posts')->with('success','post ceated successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    //    return $id;
      // $post=Post::find($id);
       //return $post;
       $post=Post::where('slug',$slug)->first();
       return view('posts.show',compact('post'));
       
       
        // $post=Post::find('$id');
        // return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    
    {
        //
                $tags=Tag::all();

        $post=Post::find($id);
        //هيرجع ال اي دي بتاع اليوزر الي عامل البوست الي انا فيه

        $userId=Auth::id();
        if($post->user_id !== $userId){

            return redirect('/posts')->with('error','this is not your post');
        }
        $tags=Tag::all();

        
        return view('posts.edit',compact('post','tags'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(['title'=>'bail|required|min:3','body'=>'required']);


        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');


        $userId=Auth::id();
        if($post->user_id !== $userId){

            return redirect('/posts')->with('error','this is not your post');
        }



        $post->save();

        $post->tags()->sync($request->tags);


        return redirect('/posts/'.$post->slug)->with('success','post update successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::find($id);


        $userId=Auth::id();
        if($post->user_id !== $userId){

            return redirect('/posts')->with('error','this is not your post');
        }
        $post->delete();
        return redirect('/posts')->with('success','post delete successfuly');


    }
}
