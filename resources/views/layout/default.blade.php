<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name','mysite')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/extra.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/css/select2.min.css"  />

    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>

    
    
    
</head>
<body>
 @include('elements.navbar')
 <br>
 <br>
 <br>
 <br>
 <br>
 <div class="container">
 @include('elements.flash')
    @yield('content')
    </div>
    @yield('javascript')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/js/select2.min.js"></script>
  
</body>
</html>