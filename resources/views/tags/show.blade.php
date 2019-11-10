@extends('layout.default')
@section('content')
<div class="row">
    <div class="col-md-8">
<h2> post tagged {{$tag->tag}}</h2>

@foreach($tag->posts as $post)

<div class="card">
    <div class="card-header">
    <h3><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h3>
    </div>
    <div class="card-body">
        <h5 class="card-title"></h5>

        <p class="card-text"><h3>
        
        {{str_limit(strip_tags($post->body),50)}}
        
        </h3></p>

    </div>
    <div class ="card-footer">
    <span class="label label-primary ">
    <li class= "fas fa-calender"></li>{{$post->created_at}}
    </span>
    &nbsp
    <span class="label label-success">
    <li class= "fas fa-user"></li>{{$post['user']['name']}} 
    <!-- ملحوظه هنا منفعشي انده على فانكشن عادي و اتضريت اعملها بين القوسين دول-->
    
    </span>
    
    </div>
</div>
<br>


 <!-- <div class="panel">
  <div class="panel-heading"><h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3></div>
  <div class="panel-body"><h3>{{$post->body}}</h3>
</div>
</div> -->
    @endforeach
    </div>
    <div class="col-md-4">to do </div>
    </div>
  
    @endsection