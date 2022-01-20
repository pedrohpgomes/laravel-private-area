<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Private Area</title>

        <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}"
    </head>
    <body>
        @include('layouts/flash-message')
        @yield('content')
        <script scr="{{asset('assets/jquery-3.6.0.js')}}"></script>
        <script scr="{{asset('assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
        
    </body>
</html>