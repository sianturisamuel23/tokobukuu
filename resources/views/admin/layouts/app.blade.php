<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Toko Buku')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root{
            --admin-ink:#111827;
            --admin-muted:#6b7280;
            --admin-line:#e5e7eb;
            --admin-brand:#0f766e;
            --admin-brand-dark:#0f3f3a;
            --admin-soft:#f8fafc;
        }

        body{
            margin:0;
            min-height:100vh;
            background:#eef2f7;
            color:var(--admin-ink);
            font-family:Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .admin-shell{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            position:fixed;
            left:0;
            top:0;
            width:264px;
            height:100vh;
            background:linear-gradient(180deg, var(--admin-brand-dark), var(--admin-brand));
            overflow:auto;
            padding:18px;
            color:#fff;
        }

        .brand-box{
            display:flex;
            align-items:center;
            gap:.75rem;
            padding:12px;
            margin-bottom:20px;
            border-radius:8px;
            background:rgba(255,255,255,.1);
            font-weight:800;
        }

        .brand-box i{
            display:grid;
            place-items:center;
            width:38px;
            height:38px;
            border-radius:8px;
            background:#fff;
            color:var(--admin-brand);
        }

        .sidebar a{
            display:flex;
            align-items:center;
            gap:.75rem;
            color:rgba(255,255,255,.86);
            padding:12px 14px;
            margin-bottom:6px;
            border-radius:8px;
            text-decoration:none;
            font-weight:700;
        }

        .sidebar a:hover,
        .sidebar a:focus{
            background:rgba(255,255,255,.13);
            color:#fff;
        }

        .content{
            width:100%;
            margin-left:264px;
            padding:24px;
        }

        .topbar{
            background:#fff;
            padding:18px 22px;
            border-radius:8px;
            box-shadow:0 14px 40px rgba(15,23,42,.08);
            margin-bottom:24px;
        }

        .topbar h4{
            font-weight:800;
            letter-spacing:0;
        }

        .admin-user{
            color:var(--admin-muted);
            font-weight:700;
        }

        .card{
            border:none;
            border-radius:8px;
            box-shadow:0 14px 40px rgba(15,23,42,.08);
            overflow:hidden;
        }

        .card-header{
            background:#fff;
            border-bottom:1px solid var(--admin-line);
            padding:18px 22px;
        }

        .card-body{
            padding:24px;
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
            border-color:var(--admin-line);
            vertical-align:middle;
        }

        .btn{
            border-radius:8px;
            font-weight:700;
        }

        .btn-primary{
            background:var(--admin-brand);
            border-color:var(--admin-brand);
        }

        .btn-primary:hover,
        .btn-primary:focus{
            background:var(--admin-brand-dark);
            border-color:var(--admin-brand-dark);
        }

        .form-control,
        .form-select{
            min-height:42px;
            border-radius:8px;
            border-color:#d1d5db;
        }

        .form-label{
            font-weight:700;
            color:#374151;
        }

        .alert{
            border:none;
            border-radius:8px;
            box-shadow:0 10px 30px rgba(15,23,42,.08);
        }

        .stat-card .card-body{
            display:flex;
            align-items:center;
            justify-content:space-between;
            text-align:left;
        }

        .stat-icon{
            display:grid;
            place-items:center;
            width:52px;
            height:52px;
            border-radius:8px;
            background:#ecfdf5;
            color:var(--admin-brand);
            font-size:1.45rem;
        }

        @media (max-width: 991.98px){
            .admin-shell{
                display:block;
            }

            .sidebar{
                position:relative;
                width:100%;
                height:auto;
                display:block;
            }

            .content{
                margin-left:0;
                padding:16px;
            }

            .topbar{
                flex-direction:column;
                align-items:flex-start !important;
                gap:.5rem;
            }
        }
    </style>
</head>

<body>

<div class="admin-shell">
    <aside class="sidebar">
        <div class="brand-box">
            <i class="bi bi-book-half"></i>
            <span>Toko Buku</span>
        </div>

        <a href="{{ route('dashboard') }}">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="{{ route('kategori.index') }}">
            <i class="bi bi-folder2-open"></i>
            Kategori
        </a>

        <a href="{{ route('buku.index') }}">
            <i class="bi bi-journal-bookmark"></i>
            Buku
        </a>

        <a href="{{ route('pesanan.index') }}">
            <i class="bi bi-box-seam"></i>
            Pesanan
        </a>

        <hr class="border-light opacity-25">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-light w-100">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </form>
    </aside>

    <main class="content">
        <div class="topbar d-flex justify-content-between align-items-center">
            <h4 class="mb-0">@yield('judul')</h4>
            <span class="admin-user">
                <i class="bi bi-person-circle"></i>
                {{ Auth::user()->name }}
            </span>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
