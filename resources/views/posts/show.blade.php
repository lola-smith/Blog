@extends('layout.default')
@section('content')
<h1>{{$post->title}}</h1>
@if(!Auth::guest()&& (Auth::user()->id == $post->user_id))
<div class="clearfix">

<a href="/posts/{{$post->id}}/edit" class="btn btn-primary">  <li class= "fas fa-edit"></li> edit post </a>
<div class=" float-right">
{!! Form::open(['action'=>['postcontroller@destroy',$post->id],'method'=>'POST'])!!}
{!!Form::hidden('_method','DELETE')!!}
<button class="btn btn-danger" type="submit">
delete post
</button>

{!! Form::close()!!}

</div>

</div>
@endif

<hr />



<div>
    <img src="{{asset('images/posts/'.$post->photo)}}" class="img-responsive">
{!!$post->body!!}

@foreach($post->tags as $tag)
<a href="{{route('tags.show',$tag->id)}}">
<label class="label label-info">
    <i class="fa fa-tag"></i> {{$tag->tag}}
</label>
</a>
&nbsp;
@endforeach

</div>
<hr />
<h4>Comment :{{$post->comments->count()}}</h4>


<ul class="comments">
@foreach($post->comments as $comment)
<li class="comment">
 <div class="clearfix">
 <h4 class="float-left">{{$comment->user->name}}</h4>
 <p class="float-right">{{$comment->created_at->format('d m y')}}</p>

 </div>
 <p>{{ $comment->body}}</p>
</li>
@endforeach
</ul>

<div class="card">
    <div class="card-header">
    add your comment
    </div>



    <div class="card-body">
        @guest
    <div class="alert alert-info">
        plees login tp comment 
    </div>
        @else
     <form action="{{ route('comments.store',$post->slug)}}"  method="POST">
     {{csrf_field()}}
     <div class="form-group">
         <label for="Comment">Comment</label>
        <textarea name="body" class="form-control "  placeholder="enter your comment" cols="30" rows="10"></textarea>
     </div>

     <div class="form-group text-right">
       <button type="submit"class="btn btn-primary"> Add Comment</button>
     </div>

     </form>
     @endguest
    </div>
   
</div>
@endsection




