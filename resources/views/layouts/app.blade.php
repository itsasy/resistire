<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   
   @yield('sound')
   
   @if(session('usr_style') == null)
     <link rel="stylesheet" href="{{asset('css/style_rivera.css')}}">

   @else
      <link rel="stylesheet" href="{{asset('css/style_rivera.css')}}">
      <link rel="stylesheet" href="{{asset('css/'.session('usr_style'))}}">

   @endif
   
   @stack('styles')
   <title> RESISTIRÉ {{session('usr_style') }}- @yield('title') </title>

</head>

<body>
   <header>
      @yield('header')
   </header>
   <div>
      @yield('toggle_menu')
      @yield('btn_return_map')
      @yield('btn_previous')
      @yield('content')
   </div>


   <script src="{{asset('js/jquery.min.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
   <script src="{{asset('js/app.js')}}"></script>
   <script src="{{asset('js/script.js')}}"></script>

   @yield('script')
</body>

</html>