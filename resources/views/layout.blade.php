<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .bg-primary{
            background-color: #74ac9c !important;
        }
        a, .btn-link{
            color: #568f7f;
        }
        a, .btn-link:hover{
            color: #568f7f;
        }
        .btn-primary {
            color: #fff;
            background-color: #609f8d;
            border-color: #609f8d;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #568f7f;
            border-color: #568f7f;
        }
        .btn:focus, .btn:hover {
            text-decoration: none;
        }
        .form-control:focus{
            border-color: #74ac9c;
            border-color: 0 0 0 .2rem #74ac9c40;
        }   
        .navbar-dark .navbar-nav .nav-link{
            color: #ffffff;
        }
        .page-item.active .page-link{
            background-color: #74ac9c;
            border-color: #74ac9c;
        }
        .page-link{
            color: #568f7f;
        }
        .page-link:hover{
            color: #568f7f;
        }
    </style>
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Lista de Compras</a>
    @auth
    <div class="collapse navbar-collapse">
        <div class="ml-auto">
            {{auth()->user()->first_name}} 
            <form class="d-inline" action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn btn-link">Sair</button>
            </form>
        </div>
    </div>
    @else
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Cadastro</a>
            </li>
        </ul>
    </div>
    @endauth
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    @auth
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <a class="nav-link px-0" href="{{route('listas.index')}}">Minhas Listas</a>
                </ul>
            </div>
        </div>    
    @endauth
</nav>

@yield('content')

</body>
</html>
