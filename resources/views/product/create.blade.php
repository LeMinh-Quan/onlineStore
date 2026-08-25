<!-- <!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Thêm Sản Phẩm Mới</title>
<style>
body { font-family: Arial, sans-serif; background-color: #f8f9fa;
padding: 50px; }
.form-container { background: #fff; padding: 30px; border-radius:
8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); max-width: 500px; margin: 0
auto; }
.form-group { margin-bottom: 15px; }

.form-group label { display: block; font-weight: bold; margin-
bottom: 5px; }

.form-group input { width: 100%; padding: 10px; border: 1px solid
#ccc; border-radius: 4px; box-sizing: border-box; }
.btn-submit { background-color: #28a745; color: white; border:
none; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%;
font-size: 16px; }
.alert-success { background-color: #d4edda; color: #155724;
padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid
#c3e6cb; }
</style>
</head>
<body>
<div class="form-container">
<h2>Thêm Sản Phẩm Mới</h2>

@if (session('success'))
<div class="alert-success">
<strong>Thành công!</strong> {{ session('success') }}
<br>
<img src="{{ asset('storage/' . session('image_path')) }}"
alt="Ảnh SP" style="max-width: 100px; margin-top: 10px; border-radius:
4px;">
</div>
@endif

<form action="{{ route('products.store') }}" method="POST"
enctype="multipart/form-data">
@csrf

<div class="form-group">
<label>Tên sản phẩm:</label>
<input type="text" name="product_name" required
placeholder="Nhập tên sản phẩm...">
</div>

<div class="form-group">
<label>Giá bán (VNĐ):</label>
<input type="number" name="product_price" required
placeholder="Ví dụ: 150000">
</div>

<div class="form-group">
<label>Hình ảnh sản phẩm:</label>
<input type="file" name="product_image" accept="image/*"
required>
</div>
<button type="submit" class="btn-submit">Lưu Sản Phẩm</button>
</form>
</div>

</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm sản phẩm mới</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5" style="max-width: 600px;">
	<h2>Thêm sản phẩm mới</h2>
	<a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Quay lại danh sách</a>

	<form action="{{ route('products.store') }}" method="POST">
		@csrf
		<div class="mb-3">
			<label class="form-label">Danh mục</label>
			<select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
				<option value="">-- Chọn danh mục --</option>
				@foreach ($categories as $category)
					<option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
				@endforeach
			</select>
			@error('category_id')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label">Tên sản phẩm</label>
			<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
			@error('name')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label">Giá bán</label>
			<input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
			@error('price')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label">Số lượng tồn kho</label>
			<input type="number" name="stock_quantity" class="form-control @error('stock_quantity') is-invalid @enderror" value="{{ old('stock_quantity') }}">
			@error('stock_quantity')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label">Mô tả sản phẩm</label>
			<textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
		</div>

		<button type="submit" class="btn btn-success">Lưu sản phẩm</button>
	</form>
</body>
</html>
