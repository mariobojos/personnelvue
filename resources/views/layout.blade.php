<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personnel Skills</title>
    <link rel="stylesheet" href="../css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
{{--    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">--}}
{{--        <a class="navbar-brand text-warning" href="#">Personnel Skills</a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <ul class="navbar-nav mr-auto">--}}
{{--            <li class="nav-item active">--}}
{{--            <a class="nav-link" href="/">Home--}}
{{--                <span class="sr-only">(current)</span>--}}
{{--            </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--            <a class="nav-link" href="/skill">Skills</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
    <div class="container-fluid mt-4">
        @yield('content')
    </div>
</body>
</html>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li> --}}
      {{-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form> --}}


