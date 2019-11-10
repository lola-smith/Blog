<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <h1>hellow{{$user->name}}</h1> 
    <p> to verify your email click the link bellow</p>
   
    <hr />
    <a href="{{url('user/verify',$user->verifyUser->token )}}" > verify your email</a>
</body>
</html>