@extends('layout.default')
@section('content')
<h1>contact us</h1>
<hr />


{!! Form::open(['action'=>'pagecontroller@dosend','method'=>'POST']) !!}
<div class="form-group">
{{form::label('Name')}}
{{form::text('name','',['placeholder'=>'enter your name','class'=>'form-control'])}}
</div>

<div class="form-group">
{{form::label('Email')}}
{{form::text('email','',['placeholder'=>'enter your email','class'=>'form-control'])}}
</div>

<div class="form-group">
{{form::label('Subject')}}
{{form::text('subject','',['placeholder'=>'enter your Subject','class'=>'form-control'])}}
</div>


<div class="form-group">
{{form::label('Body')}}
{{form::textarea('body','',['placeholder'=>'enter your masseg','class'=>'form-control'])}}
</div>

<div class="form-group float-right">
{{form::submit('send massege',['class'=>'btn btn-primary'])}}

</div>
{!! Form::close() !!}
    @endsection