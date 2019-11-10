@extends('layout.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                <div class="btn-group float-right">
                <a href="posts/create" class="btn btn-sm btn-light">
                <i class="fas fa-plus"></i> new post
                </a>
                 </div>
                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                   <h3>your posts</h3>
                   <table class="table table-striped">

                   <thead>
                   <tr>

                   <th>title</th>
                   <th>created</th>
                   <th>edit</th>
                   <th>delete</th>
                   </tr>
                   </thead>

                       <tbody>
                       
                       @foreach($posts as $post)
                           <tr>
                           <td>{{$post->title}}</td>
                           <td>{{$post->created_at}}</td>
                           <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm">  <li class= "fas fa-edit"></li> edit post </a></td>
                           <td>{!! Form::open(['action'=>['postcontroller@destroy',$post->id],'method'=>'POST'])!!}
                               {!!Form::hidden('_method','DELETE')!!}
                             <button class="btn btn-danger btn-sm" type="submit">
                             delete post
                             </button>

                                {!! Form::close()!!}
                              </td>
                           </tr>
                           @endforeach
                           
                       </tbody>
                   </table>
                   
                   
                   
                   
                   
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


