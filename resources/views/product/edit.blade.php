<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chỉnh sửa sản phẩm</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5" style="max-width: 600px;">
	<h2>Chỉnh sửa sản phẩm</h2>
	<a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Quay lại danh sách</a>

	<form action="{{ route('products.update', $product->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="mb-3">
			<label class="form-label">Danh mục</label>
			<select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
				<option value="">-- Chọn danh mục --</option>
				@foreach ($categories as $category)
					<option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
				@endforeach
			</select>
			@error('category_id')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label">Tên sản phẩm</label>
			<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
			@error('name')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label">Giá bán</label>
			<input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
			@error('price')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label">Số lượng tồn kho</label>
			<input type="number" name="stock_quantity" class="form-control @error('stock_quantity') is-invalid @enderror" value="{{ old('stock_quantity', $product->stock_quantity) }}">
			@error('stock_quantity')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label">Mô tả sản phẩm</label>
			<textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
		</div>

		<button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
	</form>
</body>
</html>
