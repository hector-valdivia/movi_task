<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">{{ env('APP_NAME') }}</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/genre">List Genres</a>
        <a class="p-2 text-dark" href="/">List Movies</a>
        <a class="p-2 text-dark" href="/actor">List Actors</a>
    </nav>

    @if(auth()->check())
        Hello, <b>{{ auth()->user()->name }}</b> ( <a href="/logout">logout</a>)
    @else
        <a class="btn btn-outline-primary" href="{{ route('login') }}">Sign up</a>
    @endif

</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>
