@extends('layout.default')
@section('content')

<h1>add konw post</h1>
<hr />
{!! Form::open(['action'=>'postcontroller@store','method'=>'POST' ,'files'=>true]) !!}
<div class="form-group">
{{form::label('title')}}
{{form::text('title','',['placeholder'=>'enter post title','class'=>'form-control'])}}
</div>

<div class="form-group">
{{form::label('Body')}}
{{form::textarea('body','',['placeholder'=>'enter post hear','class'=>'form-control ckeditor'])}}
</div>

<div class="form-group">
{{form::label('Tags')}}
<select name="tags[]" class="form-control tags"  multiple="multiple">
    @foreach($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->tag}}</option>
    @endforeach
</select>
</div>

<div class="form-group">
{{form::label('Featured Image')}}
{{form::file('photo',['placeholder'=>'select featured image','class'=>'form-control ckeditor'])}}
</div>

<div class="form-group float-right">
{{form::submit('save',['class'=>'btn btn-primary'])}}

</div>
{!! Form::close() !!}


@endsection


@section('javascript')

<script type="text/javascript">
$(document).ready(function() {
    $('.tags').select2();
});

</script>
@endsection
