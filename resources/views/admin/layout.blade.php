<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Toko Buku')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            min-height:100vh;
            background:#0d6efd;
        }

        .sidebar a{
            color:white;
            display:block;
            padding:15px;
            text-decoration:none;
        }

        .sidebar a:hover{
            background:#0b5ed7;
        }

        .content{
            flex:1;
            padding:25px;
        }

        .logo{
            font-size:22px;
            font-weight:bold;
            text-align:center;
            padding:20px;
            color:white;
        }
    </style>

</head>

<body>

<div class="d-flex">

    <div class="sidebar">

        <div class="logo">
            📚 TOKO BUKU
        </div>

        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>

        <a href="{{ route('kategori.index') }}">📂 Kategori</a>

        <a href="{{ route('buku.index') }}">📚 Buku</a>

        <a href="{{ route('pesanan.index') }}">📦 Pesanan</a>

        <hr class="text-white">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="btn btn-danger w-100 rounded-0">
                Logout
            </button>
        </form>

    </div>

    <div class="content">

        @yield('content')

    </div>

</div>

</body>
</html>