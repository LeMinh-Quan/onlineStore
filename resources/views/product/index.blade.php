<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <nav class="d-flex justify-content-end align-items-center mb-4">
        @auth
            <span class="me-3">Tài khoản: {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                
                <button type="submit" class="btn btn-outline-secondary btn-sm">Đăng xuất</button>
            </form>
        @endauth
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Quản lý sản phẩm</h2>
        <div>
            @can('create', \App\Models\Product::class)
                <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
            @endcan

            @can('viewTrash', \App\Models\Product::class)
                <a href="{{ route('products.trash') }}" class="btn btn-warning">Thùng rác</a>
            @endcan
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category?->name ?? 'Chưa phân loại' }}</td>
                <td>{{ number_format($product->price) }} đ</td>
                <td>{{ $product->stock_quantity }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-secondary">Xem</a>

                    @can('update', $product)
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info">Sửa</a>
                    @endcan

                    @can('delete', $product)
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tạm sản phẩm này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</body>
</html>