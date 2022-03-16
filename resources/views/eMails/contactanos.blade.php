<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    h1 {
      color: blue;
    }

  </style>
</head>

<body>
  <h1>Correo Electrónico</h1>
  <hr>
  <p>este es el 1er correo por laravel</p>

  <p>Nombre: {{ $contacto['name'] }}</p>

  eMail:{{ $contacto['email'] }}<br>
  <br>
  Mensaje
  <br> {{ $contacto['messagge'] }}
</body>

</html>
