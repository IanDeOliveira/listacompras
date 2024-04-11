<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Lista de Compras</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #74ac9c;">
    <a class="navbar-brand" href="#">Lista de Compras</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Nova Lista</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Sair</a>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

</body>
</html>
