<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title') Eventos App</title>
</head>
<body>

    @include('layouts.navbar')
 
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('messages.bootstrap.messages')
            </div>
        </div>
        @yield('content')
    </div>

    {{-- <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script> --}}
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>