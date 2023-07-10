<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} -Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>

      <nav class="navbar bg-dark border-bottom border-bottom-dark p-2" data-bs-theme="dark">
          <a aria-current="page" href="{{route('series.index')}}">Inicio</a>
          {{-- verificar se o usario esta lgoado. se estiver aparece sair--}}
          @auth
          <a aria-current="page" href="{{route('login.logout')}}">Sair</a>
          @endauth

        @guest
        <a aria-current="page" href="{{route('login')}}">Entrar</a>
        @endguest

      </nav>

<div class="container">
    <h1>{{ $title }}</h1>

    {{ $slot }}
</div>
</body>
</html>
