<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- favicon -->
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- estilos -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    body {
      fontfamily: 'Nunito'
    }

  </style>
</head>

<body>
  <!-- header -->
  <header>
    @include('layouts.partials.header')
  </header>
  {{-- mensajes --}}
  <div class="container">
    {{-- @include('recursos.flashMessagges') --}}
    {{-- @if (Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
          Session::forget('success');
        @endphp
      </div>
    @endif --}}

    @yield('content')
  </div>
  <!-- footer -->
  <footer>
    @include('layouts.partials.footer')
  </footer>
  <!-- script -->
</body>

</html>
