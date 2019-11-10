@extends('layout.default')
@section('content')

<h1>Edit {{$post->title}}</h1>
<hr />
{!! Form::open(['action'=>['postcontroller@update',$post->id],'method'=>'POST']) !!}
{{Form::hidden('_method','PUT')}}
<div class="form-group">
{{form::label('title')}}
{{form::text('title',$post->title,['placeholder'=>'enter post title','class'=>'form-control'])}}
</div>

<div class="form-group">
{{form::label('Body')}}
{{form::textarea('body',$post->body,['placeholder'=>'enter post hear','class'=>'form-control ckeditor'])}}
</div>

<div class="form-group">
{{form::label('Tags')}}
<select name="tags[]" class="form-control tags"  multiple="multiple">
    @foreach($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->tag}}</option>
    @endforeach
</select>
</div>

<div class="form-group float-right">
{{form::submit('update',['class'=>'btn btn-primary'])}}

</div>
{!! Form::close() !!}
@endsection


@section('javascript')

<script type="text/javascript">
$(document).ready(function() {
    $('.tags').select2().val({!!json_encode($post->tags()->pluck('id')) !!}).trigger('change');
});

</script>
@endsection