<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <title>Conversión de Moneda - TumiPay</title>
</head>
<body>
<div class="ui stackable menu">
    <div class="item">
        <img src="{{ asset('img/tumi.png') }}">
    </div>
        <div class="ui simple dropdown item">
          Conversión de Moneda
          <i class="dropdown icon"></i>
          <div class="menu">
            <a href="/conversion" class="item">Realizar Conversión</a>
          </div>
        </div>
        <div class="right menu">
          <a href="{{ route('login') }}" class="item">Ingresar</a>
          <form method="POST" name="logoutform" action="{{ route('logout') }}"> @csrf <a onclick="logout();" class="item">Salir</a></form>
        </div>
      </div>
</div>

@yield('formulario')


</body>
</html>