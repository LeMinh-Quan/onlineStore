<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Online Store')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-header { background-color: #1a252f; }
        .bg-banner { background-color: #1abc9c; }
        .footer { background-color: #1a252f; color: #fff; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-header py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="{{ route('home.index') }}">Online Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link text-white me-3" href="{{ route('home.index') }}">Home</a>
                    <a class="nav-link text-white me-3" href="{{ route('products.index') }}">Products</a>
                    <a class="nav-link text-white me-3" href="{{ route('home.about') }}">About</a>
                    
                    @guest
                        <a class="nav-link text-white me-3" href="{{ route('login') }}">Đăng nhập</a>
                        <a class="nav-link text-white" href="{{ route('register') }}">Đăng ký</a>
                    @else
                        @can('create', \App\Models\Product::class)
                            <a class="nav-link text-white me-3" href="{{ route('products.create') }}">Thêm Sản phẩm</a>
                        @endcan
                        <span class="nav-link text-white font-weight-bold">Chào, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white">
                                Đăng xuất
                            </button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Green Banner Header -->
    <header class="bg-banner text-white text-center py-4">
        <div class="container">
            <h2 class="fw-bold mb-0">@yield('subtitle', 'Online Store - Laravel Framework')</h2>
        </div>
    </header>

    <!-- Main Content Dynamic Body -->
    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer text-center py-3 mt-auto">
        <div class="container">
            <small>Copyright - NDDuy - CKC</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>