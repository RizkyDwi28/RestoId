<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/fav-icon.png') }}">

    <title>Resto ID @yield('title page')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <a class="navbar-brand ms-2 border rounded-4 bg-light text-dark px-2 py-1" href="{{ route('home') }}">
            <img src="{{ asset('img/fav-icon.png') }}" height="30" width="30">
            <b>Resto ID</b>
        </a>
        <button class="navbar-toggler me-2 border border-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-1 me-1" id="navbarToggler">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('menu.index') }}" class="nav-link">Show Menu</a>
                </li>
                @auth
                    @if(Auth::user()->role_id == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Manage Menu</a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('menu.manage') }}">View Menu</a></li>
                            <li><a class="dropdown-item" href="{{ route('menu.create') }}">Add Menu</a></li>
                            </ul>
                        </li>
                    @elseif(Auth::user()->role_id == 2)
                        <li class="nav-item">
                            <a href="{{ route('cart.list') }}" class="nav-link">My Cart</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('history.page') }}" class="nav-link">Transaction History</a>
                        </li>
                    @endif
                @endauth
            </ul>
            @auth
                <form class="d-flex flex-fill" action="{{ route('menu.search') }}" method="GET">
                    <input type="text" class="form-control mx-2 my-3" id="nameInsert" placeholder="Search menu. . ." value="{{ old('name') }}" name="name">
                    <button type="submit" class="btn btn-primary me-2 my-3">Search</button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Profile</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><strong>{{ session()->get('currUserSession')->username }}</strong></a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('password.edit') }}">Change Passowrd</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="btn btn-dark border m-1">Logout</a>
                    </li>
                </ul>
            @endauth
            @guest
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('login.page') }}" class="btn btn-dark border m-1">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register.page') }}" class="btn btn-dark border m-1">Register</a>
                    </li>
                </ul>
            @endguest
        </div>
    </nav>
    @yield('content page')
    <footer class="mt-auto pt-3 pb-1 bg-dark text-white text-center">
        <p>© CopyRight 2023 Resto ID</p>
    </footer>
</body>
</html>
