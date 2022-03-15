<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- favicon -->
  <!-- estilos -->
  <style>
    .active {
      color: blue;
      font-weight: bold;
    }

  </style>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <!-- header -->
  <header>
    @include('layouts.partials.header')
  </header>
  @yield('content')
  <!-- footer -->
  <footer>
    @include('layouts.partials.footer')
  </footer>
  <!-- script -->
</body>

</html>
