<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Toko Buku')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            background:#f8f9fa;
        }

        .sidebar{
            position:fixed;
            left:0;
            top:0;
            width:250px;
            height:100vh;
            background:#0d6efd;
            overflow:auto;
        }

        .sidebar h3{
            color:#fff;
            text-align:center;
            padding:20px 0;
            border-bottom:1px solid rgba(255,255,255,.2);
        }

        .sidebar a{
            display:block;
            color:#fff;
            padding:15px 20px;
            text-decoration:none;
        }

        .sidebar a:hover{
            background:#0b5ed7;
        }

        .content{
            margin-left:250px;
            padding:20px;
        }

        .topbar{
            background:#fff;
            padding:15px 25px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
            margin-bottom:20px;
        }

        .card{
            border:none;
            border-radius:15px;
        }

        .card-body{
            padding:25px;
        }
    </style>

</head>

<body>

<div class="sidebar">

    <h3>📚 TOKO BUKU</h3>

    <a href="{{ route('dashboard') }}">
        🏠 Dashboard
    </a>

    <a href="{{ route('kategori.index') }}">
        📂 Kategori
    </a>

    <a href="{{ route('buku.index') }}">
        📚 Buku
    </a>

    <a href="{{ route('pesanan.index') }}">
        📦 Pesanan
    </a>

    <hr class="text-white">

    <form method="POST" action="{{ route('logout') }}" class="px-3">
        @csrf

        <button class="btn btn-danger w-100">
            Logout
        </button>

    </form>

</div>

<div class="content">

    <div class="topbar d-flex justify-content-between">

        <h4 class="mb-0">
            @yield('judul')
        </h4>

        <strong>
            {{ Auth::user()->name }}
        </strong>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>