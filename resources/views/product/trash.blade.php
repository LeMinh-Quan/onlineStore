<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thùng rác sản phẩm</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h2>Thùng rác sản phẩm</h2>
		<a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
	</div>

	@if(session('success'))
		<div class="alert alert-success">{{ session('success') }}</div>
	@endif

	<table class="table table-bordered table-hover">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($products as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->name }}</td>
				<td>
					<form action="{{ route('products.restore', $product->id) }}" method="POST" class="d-inline">
						@csrf
						@method('PATCH')
						<button type="submit" class="btn btn-sm btn-success">Khôi phục</button>
					</form>
					@can('forceDelete', $product)
						<form action="{{ route('products.forceDelete', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('CẢNH BÁO: Hành động này sẽ xóa dữ liệu vĩnh viễn và không thể hoàn tác!')">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger">Xóa vĩnh viễn</button>
						</form>
					@endcan
				</td>
			</tr>
			@empty
			<tr>
				<td colspan="3" class="text-center text-muted">Thùng rác trống.</td>
			</tr>
			@endforelse
		</tbody>
	</table>

	<div class="d-flex justify-content-center mt-4">
		{{ $products->links() }}
	</div>
</body>
</html>
