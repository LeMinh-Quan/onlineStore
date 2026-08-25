# Online Store

Ứng dụng quản lý cửa hàng trực tuyến được xây dựng bằng Laravel 12. Project
cung cấp các chức năng cơ bản để quản lý danh mục, sản phẩm và sản phẩm đã bị
xóa thông qua giao diện Blade.

## 1. Chức năng chính

### Trang chung

- Trang chủ tại `/`.
- Trang giới thiệu tại `/about`.
- Giao diện sử dụng Blade và Bootstrap.

### Quản lý sản phẩm

- Xem danh sách sản phẩm có phân trang, tối đa 10 sản phẩm mỗi trang.
- Xem thông tin chi tiết sản phẩm.
- Thêm sản phẩm mới thuộc một danh mục.
- Chỉnh sửa tên, giá, số lượng tồn kho và mô tả sản phẩm.
- Kiểm tra dữ liệu đầu vào bằng Form Request.
- Xóa mềm sản phẩm vào thùng rác.
- Khôi phục sản phẩm đã xóa.
- Xóa vĩnh viễn sản phẩm khỏi database.

### Dữ liệu mẫu

- Tạo 10 danh mục bằng `CategoryFactory`.
- Tạo 50 sản phẩm bằng `ProductFactory`.
- Mỗi sản phẩm được gán ngẫu nhiên vào một danh mục có sẵn.

## 2. Công nghệ sử dụng

- PHP 8.2 trở lên.
- Laravel 12.
- Composer.
- SQLite mặc định hoặc MySQL.
- Blade Template Engine.
- Bootstrap 5 qua CDN.
- Vite và Tailwind CSS.
- PHPUnit cho kiểm thử.

## 3. Yêu cầu trước khi cài đặt

Đảm bảo máy đã cài đặt:

- PHP 8.2+ với các extension cần thiết cho Laravel.
- Composer.
- Node.js và npm.
- Git nếu clone project từ repository.

Kiểm tra phiên bản:

```bash
php -v
composer -V
node -v
npm -v
```

## 4. Cài đặt project

### Bước 1: Lấy mã nguồn

```bash
git clone <repository-url>
cd onlineStore
```

Nếu project đã có sẵn trên máy, chỉ cần mở terminal tại thư mục project.

### Bước 2: Cài đặt thư viện PHP

```bash
composer install
```

### Bước 3: Tạo file môi trường

Trên Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Trên macOS/Linux:

```bash
cp .env.example .env
```

### Bước 4: Tạo application key

```bash
php artisan key:generate
```

## 5. Cấu hình database

### Sử dụng SQLite

Trong file `.env`, đặt:

```env
DB_CONNECTION=sqlite
```

Tạo file database nếu file chưa tồn tại.

Windows PowerShell:

```powershell
New-Item database/database.sqlite -ItemType File
```

macOS/Linux:

```bash
touch database/database.sqlite
```

### Sử dụng MySQL

Tạo database MySQL, sau đó cập nhật các thông tin tương ứng trong `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=online_store
DB_USERNAME=root
DB_PASSWORD=
```

## 6. Migration và seeding

Chạy migration:

```bash
php artisan migrate
```

Tạo dữ liệu mẫu:

```bash
php artisan db:seed
```

Hoặc xóa toàn bộ bảng, tạo lại cấu trúc và seed lại dữ liệu:

```bash
php artisan migrate:fresh --seed
```

Lưu ý: `migrate:fresh --seed` sẽ xóa toàn bộ dữ liệu hiện có trong database.

Các file database quan trọng:

- `database/migrations`: định nghĩa bảng và cột.
- `database/factories/CategoryFactory.php`: dữ liệu mẫu danh mục.
- `database/factories/ProductFactory.php`: dữ liệu mẫu sản phẩm.
- `database/seeders/DatabaseSeeder.php`: nơi gọi các factory.

## 7. Cài đặt và chạy frontend

Cài đặt package JavaScript:

```bash
npm install
```

Build tài nguyên frontend:

```bash
npm run build
```

Trong quá trình phát triển, có thể chạy Vite ở chế độ theo dõi thay đổi:

```bash
npm run dev
```

## 8. Khởi động ứng dụng

Mở một terminal và chạy:

```bash
php artisan serve
```

Nếu cần chạy cả Laravel server và Vite, mở terminal khác chạy:

```bash
npm run dev
```

Truy cập ứng dụng tại:

```text
http://127.0.0.1:8000
```

## 9. Các route chính

| Method | URL | Chức năng |
| --- | --- | --- |
| GET | `/` | Trang chủ |
| GET | `/about` | Trang giới thiệu |
| GET | `/products` | Danh sách sản phẩm |
| GET | `/products/create` | Form thêm sản phẩm |
| POST | `/products` | Lưu sản phẩm mới |
| GET | `/products/{id}` | Chi tiết sản phẩm |
| GET | `/products/{id}/edit` | Form chỉnh sửa sản phẩm |
| PUT/PATCH | `/products/{id}` | Cập nhật sản phẩm |
| DELETE | `/products/{id}` | Xóa mềm sản phẩm |
| GET | `/products/trash` | Danh sách sản phẩm trong thùng rác |
| POST | `/products/{id}/restore` | Khôi phục sản phẩm |
| DELETE | `/products/{id}/force-delete` | Xóa vĩnh viễn sản phẩm |

## 10. Quy tắc validation sản phẩm

Các trường sản phẩm được kiểm tra trong
`app/Http/Requests/StoreProductRequest.php`:

- `category_id`: bắt buộc và phải tồn tại trong bảng `categories`.
- `name`: bắt buộc, dạng chuỗi, từ 5 đến 255 ký tự.
- `price`: bắt buộc, dạng số và không nhỏ hơn 0.
- `stock_quantity`: bắt buộc, số nguyên và không nhỏ hơn 0.
- `description`: không bắt buộc, dạng chuỗi.

## 11. Soft Delete

Sản phẩm sử dụng `SoftDeletes`. Khi dùng chức năng xóa thông thường, bản ghi
không bị xóa ngay mà được đánh dấu thời gian trong cột `deleted_at`.

- Sản phẩm đang hoạt động xuất hiện tại `/products`.
- Sản phẩm đã xóa xuất hiện tại `/products/trash`.
- Khôi phục bằng chức năng `restore`.
- Xóa hoàn toàn bằng chức năng `forceDelete`.

## 12. Cấu trúc thư mục quan trọng

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   └── ProductController.php
│   └── Requests/
│       └── StoreProductRequest.php
├── Models/
│   ├── Category.php
│   ├── Product.php
│   └── User.php
database/
├── factories/
├── migrations/
└── seeders/
	└── DatabaseSeeder.php
resources/
├── css/
├── js/
└── views/
	├── home/
	├── layouts/
	└── product/
routes/
└── web.php
tests/
├── Feature/
└── Unit/
```

## 13. Kiểm thử

Chạy toàn bộ test:

```bash
php artisan test
```

Hoặc chạy thông qua Composer:

```bash
composer test
```

## 14. Một số lệnh Artisan hữu ích

```bash
php artisan route:list
php artisan migrate:status
php artisan optimize:clear
php artisan storage:link
```

## 15. Đóng góp và Git workflow

Kiểm tra trạng thái thay đổi:

```bash
git status
```

Thêm thay đổi, commit và push lên nhánh `main`:

```bash
git add .
git commit -m "php_lab07_25/8"
git push origin main
```

## Tác giả

Lê Minh Quân
