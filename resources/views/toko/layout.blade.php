<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{
            background:#f4f6f9;
        }

        .navbar-brand{
            font-weight:bold;
            letter-spacing:1px;
        }

        .card{
            border:none;
        }

        footer{
            margin-top:60px;
            padding:20px;
            text-align:center;
            color:#777;
        }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            📚 TOKO BUKU
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="bi bi-house-door-fill"></i>
                        Home
                    </a>
                </li>

                @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="bi bi-cart-fill"></i>
                            Keranjang
                        </a>
                    </li>

                    <li class="nav-item">
    <a class="nav-link" href="{{ route('user.pesanan.index') }}">
        <i class="bi bi-receipt"></i>
        Pesanan Saya
    </a>
</li>

                    @if(auth()->user()->role == 'admin')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2"></i>
                                Dashboard
                            </a>
                        </li>

                    @endif

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">

                            <i class="bi bi-person-circle"></i>

                            {{ auth()->user()->name }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>

                                <form action="{{ route('logout') }}" method="POST">

                                    @csrf

                                    <button type="submit" class="dropdown-item">

                                        <i class="bi bi-box-arrow-right"></i>

                                        Logout

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="bi bi-person-plus-fill"></i>
                            Register
                        </a>
                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<div class="container py-4">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    @yield('content')

</div>

<footer>

    © {{ date('Y') }} Toko Buku Laravel

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>