<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root{
            --ink:#17202a;
            --muted:#6b7280;
            --line:#e5e7eb;
            --brand:#0f766e;
            --brand-dark:#115e59;
            --surface:#ffffff;
        }

        body{
            min-height:100vh;
            background:
                radial-gradient(circle at top left, rgba(15,118,110,.12), transparent 34rem),
                linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
            color:var(--ink);
            font-family:Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .navbar{
            background:rgba(15,118,110,.96);
            backdrop-filter:blur(16px);
        }

        .navbar-brand{
            display:flex;
            align-items:center;
            gap:.6rem;
            font-weight:800;
            letter-spacing:0;
        }

        .brand-mark{
            display:inline-grid;
            place-items:center;
            width:36px;
            height:36px;
            border-radius:8px;
            background:#ffffff;
            color:var(--brand);
        }

        .navbar .nav-link{
            border-radius:8px;
            color:rgba(255,255,255,.82);
            font-weight:600;
            padding:.55rem .8rem;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link:focus{
            background:rgba(255,255,255,.14);
            color:#ffffff;
        }

        .page-shell{
            min-height:calc(100vh - 156px);
        }

        .card,
        .table-panel{
            border:none;
            border-radius:8px;
            box-shadow:0 14px 40px rgba(15,23,42,.08);
        }

        .card{
            overflow:hidden;
        }

        .table{
            margin-bottom:0;
        }

        .table thead th{
            background:#ecfdf5;
            color:#115e59;
            border-bottom:0;
            font-size:.78rem;
            letter-spacing:.04em;
            text-transform:uppercase;
        }

        .table tbody td{
            border-color:var(--line);
            vertical-align:middle;
        }

        .btn{
            border-radius:8px;
            font-weight:700;
        }

        .btn-primary{
            background:var(--brand);
            border-color:var(--brand);
        }

        .btn-primary:hover,
        .btn-primary:focus{
            background:var(--brand-dark);
            border-color:var(--brand-dark);
        }

        .btn-success{
            background:#16a34a;
            border-color:#16a34a;
        }

        .form-control,
        .form-select{
            border-radius:8px;
            border-color:#d1d5db;
            min-height:42px;
        }

        .alert{
            border:none;
            border-radius:8px;
            box-shadow:0 10px 30px rgba(15,23,42,.08);
        }

        .section-title{
            font-weight:800;
            letter-spacing:0;
        }

        .hero-panel{
            position:relative;
            overflow:hidden;
            border-radius:8px;
            background:
                linear-gradient(135deg, rgba(15,118,110,.96), rgba(20,83,45,.92)),
                url("https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1600&q=80");
            background-size:cover;
            background-position:center;
            color:#fff;
            padding:3rem;
            min-height:270px;
            display:flex;
            align-items:end;
        }

        .hero-panel p{
            color:rgba(255,255,255,.86);
            max-width:620px;
        }

        .book-card{
            height:100%;
            transition:transform .18s ease, box-shadow .18s ease;
        }

        .book-card:hover{
            transform:translateY(-4px);
            box-shadow:0 22px 46px rgba(15,23,42,.14);
        }

        .book-cover{
            width:100%;
            height:300px;
            object-fit:cover;
            background:#e5e7eb;
        }

        .book-cover-placeholder{
            display:grid;
            place-items:center;
            height:300px;
            background:linear-gradient(135deg, #d1fae5, #fef3c7);
            color:#0f766e;
            font-size:3rem;
        }

        .price-text{
            color:#15803d;
            font-weight:800;
        }

        .dropdown-menu{
            border:none;
            border-radius:8px;
            box-shadow:0 18px 42px rgba(15,23,42,.16);
        }

        footer{
            margin-top:60px;
            padding:24px;
            text-align:center;
            color:var(--muted);
            font-weight:600;
        }

        @media (max-width: 767.98px){
            .hero-panel{
                padding:2rem;
                min-height:230px;
            }

            .book-cover,
            .book-cover-placeholder{
                height:240px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="brand-mark"><i class="bi bi-book-half"></i></span>
            Toko Buku
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto gap-lg-1">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
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

<main class="page-shell">
    <div class="container py-4 py-lg-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
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
</main>

<footer>
    &copy; {{ date('Y') }} Toko Buku. Belanja buku favorit dengan mudah.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
