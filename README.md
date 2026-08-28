# Online Store - Ứng dụng Quản lý Cửa hàng Trực tuyến

Online Store là ứng dụng web quản lý cửa hàng trực tuyến được xây dựng bằng
Laravel 12. Project hỗ trợ quản lý danh mục, sản phẩm và các sản phẩm đã xóa
thông qua giao diện Blade.

## Mục lục

- [Giới thiệu](#giới-thiệu)
- [Tính năng](#tính-năng)
- [Công nghệ](#công-nghệ)
- [Yêu cầu hệ thống](#yêu-cầu-hệ-thống)
- [Cài đặt](#cài-đặt)
- [Cấu hình database](#cấu-hình-database)
- [Các lệnh quan trọng](#các-lệnh-quan-trọng)
- [Cấu trúc thư mục](#cấu-trúc-thư-mục)
- [Routes](#routes)
- [Validation](#validation)
- [Soft Delete](#soft-delete)
- [Kiểm thử](#kiểm-thử)
- [Git workflow](#git-workflow)
- [Xử lý lỗi thường gặp](#xử-lý-lỗi-thường-gặp)
- [Tác giả](#tác-giả)

## Giới thiệu

Project được phát triển như một bài tập thực hành cho lớp CĐCNTT24, tập trung
vào các nội dung:

- Xây dựng ứng dụng theo mô hình MVC.
- Quản lý database bằng migration, factory và seeder.
- Xử lý request và validation bằng Form Request.
- Thực hiện Soft Delete trong Laravel.
- Xây dựng giao diện bằng Blade Template và Bootstrap.

## Tính năng

### Trang chung

- Trang chủ: `/`.
- Trang giới thiệu: `/about`.
- Layout dùng chung tại `resources/views/layouts/app.blade.php`.

### Quản lý sản phẩm

- Xem danh sách sản phẩm, phân trang 10 sản phẩm mỗi trang.
- Xem chi tiết sản phẩm.
- Thêm sản phẩm mới thuộc một danh mục.
- Chỉnh sửa tên, giá, số lượng tồn kho và mô tả.
- Xóa mềm sản phẩm vào thùng rác.
- Khôi phục sản phẩm đã xóa.
- Xóa vĩnh viễn sản phẩm khỏi database.

### Dữ liệu mẫu

- Tạo 10 danh mục bằng `CategoryFactory`.
- Tạo 50 sản phẩm bằng `ProductFactory`.
- Tự động gán sản phẩm vào các danh mục đã tạo.

## Công nghệ

| Công nghệ    | Phiên bản | Mục đích                          |
| ------------ | --------- | --------------------------------- |
| PHP          | 8.2+      | Ngôn ngữ backend                  |
| Laravel      | 12        | Web framework                     |
| Composer     | -         | Quản lý package PHP               |
| SQLite       | -         | Database mặc định cho development |
| MySQL        | 5.7+      | Database tùy chọn                 |
| Blade        | -         | Template engine                   |
| Bootstrap    | 5.1/5.3   | CSS framework qua CDN             |
| Tailwind CSS | 4         | Utility CSS và Vite integration   |
| Vite         | 7         | Build frontend assets             |
| PHPUnit      | 11        | Testing framework                 |

## Yêu cầu hệ thống

Cần cài đặt các phần mềm sau:

- PHP 8.2 trở lên với các extension cần thiết như `mbstring`, `openssl`,
  `pdo` và `sqlite3` hoặc `pdo_mysql`.
- Composer.
- Node.js và npm.
- Git nếu clone project từ repository.
- SQLite hoặc MySQL.

Kiểm tra phiên bản:

```bash
php -v
composer -V
node -v
npm -v
git --version
```

## Cài đặt

### 1. Lấy mã nguồn

```bash
git clone https://github.com/LeMinh-Quan/onlineStore.git
cd onlineStore
```

Nếu project đã có sẵn trên máy, mở terminal tại thư mục project.

### 2. Cài đặt thư viện PHP

```bash
composer install
```

### 3. Tạo file môi trường

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

macOS/Linux:

```bash
cp .env.example .env
```

### 4. Tạo application key

```bash
php artisan key:generate
```

### 5. Cấu hình database

Thực hiện theo hướng dẫn tại phần [Cấu hình database](#cấu-hình-database),
sau đó chạy migration và seeding.

### 6. Cài đặt frontend

```bash
npm install
npm run build
```

### 7. Khởi động ứng dụng

```bash
php artisan serve
```

Truy cập ứng dụng tại <http://127.0.0.1:8000>.

Trong quá trình phát triển, mở terminal thứ hai để chạy Vite:

```bash
npm run dev
```

## Cấu hình database

### SQLite

SQLite là lựa chọn mặc định và phù hợp cho development.

Trong `.env`:

```env
DB_CONNECTION=sqlite
```

Nếu file database chưa tồn tại, tạo file như sau.

Windows PowerShell:

```powershell
New-Item database/database.sqlite -ItemType File
```

macOS/Linux:

```bash
touch database/database.sqlite
```

### MySQL

Tạo database:

```sql
CREATE DATABASE online_store;
```

Cập nhật `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=online_store
DB_USERNAME=root
DB_PASSWORD=your_password
```

Sau đó kiểm tra bằng cách chạy migration:

```bash
php artisan migrate
```

## Migration và seeding

Tạo các bảng theo migration:

```bash
php artisan migrate
```

Tạo dữ liệu mẫu:

```bash
php artisan db:seed
```

Xóa toàn bộ bảng, tạo lại database và seed lại dữ liệu:

```bash
php artisan migrate:fresh --seed
```

Lưu ý: `migrate:fresh --seed` sẽ xóa toàn bộ dữ liệu hiện có.

Các file liên quan:

- `database/migrations/2026_08_14_003747_create_categories_table.php`.
- `database/migrations/2026_08_14_003808_create_products_table.php`.
- `database/migrations/2026_08_25_000000_add_deleted_at_to_products_table.php`.
- `database/factories/CategoryFactory.php`.
- `database/factories/ProductFactory.php`.
- `database/seeders/DatabaseSeeder.php`.

## Các lệnh quan trọng

### Database

```bash
php artisan migrate
php artisan migrate:status
php artisan migrate:rollback
php artisan migrate:fresh
php artisan migrate:fresh --seed
php artisan db:seed
```

### Cache và tối ưu

```bash
php artisan optimize
php artisan optimize:clear
php artisan cache:clear
php artisan view:clear
```

### Routes và cấu hình

```bash
php artisan route:list
php artisan config:cache
php artisan config:clear
```

### Storage và Tinker

```bash
php artisan storage:link
php artisan tinker
```

### Frontend

```bash
npm install
npm run dev
npm run build
```

## Cấu trúc thư mục

```text
onlineStore/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   └── ProductController.php
│   │   └── Requests/
│   │       └── StoreProductRequest.php
│   ├── Models/
│   │   ├── Category.php
│   │   ├── Product.php
│   │   └── User.php
│   └── Providers/
├── database/
│   ├── factories/
│   ├── migrations/
│   ├── seeders/
│   │   └── DatabaseSeeder.php
│   └── database.sqlite
├── resources/
│   ├── css/app.css
│   ├── js/
│   └── views/
│       ├── home/
│       ├── layouts/app.blade.php
│       └── product/
├── routes/web.php
├── public/
├── storage/
├── tests/
│   ├── Feature/
│   └── Unit/
├── .env.example
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
├── vite.config.js
└── README.md
```

## Routes

### Trang chung

| Method | URL      | Chức năng        |
| ------ | -------- | ---------------- |
| GET    | `/`      | Trang chủ        |
| GET    | `/about` | Trang giới thiệu |

### Quản lý sản phẩm

| Method    | URL                   | Chức năng          |
| --------- | --------------------- | ------------------ |
| GET       | `/products`           | Danh sách sản phẩm |
| GET       | `/products/create`    | Form thêm sản phẩm |
| POST      | `/products`           | Lưu sản phẩm mới   |
| GET       | `/products/{id}`      | Chi tiết sản phẩm  |
| GET       | `/products/{id}/edit` | Form chỉnh sửa     |
| PUT/PATCH | `/products/{id}`      | Cập nhật sản phẩm  |
| DELETE    | `/products/{id}`      | Xóa mềm sản phẩm   |

### Thùng rác

| Method | URL                           | Chức năng                 |
| ------ | ----------------------------- | ------------------------- |
| GET    | `/products/trash`             | Danh sách sản phẩm đã xóa |
| POST   | `/products/{id}/restore`      | Khôi phục sản phẩm        |
| DELETE | `/products/{id}/force-delete` | Xóa vĩnh viễn             |

## Validation

Validation được định nghĩa trong
`app/Http/Requests/StoreProductRequest.php`.

| Trường           | Quy tắc                            | Mô tả                    |
| ---------------- | ---------------------------------- | ------------------------ |
| `category_id`    | `required\|exists:categories,id`   | Bắt buộc và phải tồn tại |
| `name`           | `required\|string\|min:5\|max:255` | Từ 5 đến 255 ký tự       |
| `price`          | `required\|numeric\|min:0`         | Số không âm              |
| `stock_quantity` | `required\|integer\|min:0`         | Số nguyên không âm       |
| `description`    | `nullable\|string`                 | Không bắt buộc           |

Form tự động giữ lại dữ liệu hợp lệ trước đó bằng `old()` và hiển thị thông báo
lỗi bằng directive `@error`.

## Soft Delete

Model `Product` sử dụng trait `SoftDeletes`. Khi xóa thông thường, bản ghi vẫn
còn trong database và chỉ được đánh dấu thời gian tại cột `deleted_at`.

```php
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
}
```

Các truy vấn thường dùng:

```php
Product::all();
Product::onlyTrashed()->get();
Product::withTrashed()->get();
```

## Kiểm thử

Chạy toàn bộ test:

```bash
php artisan test
```

Hoặc:

```bash
composer test
```

Chạy test theo thư mục:

```bash
php artisan test tests/Feature
php artisan test tests/Unit
```

Project hiện có test feature kiểm tra trang chủ và test unit cơ bản. Có thể bổ
sung thêm test cho CRUD, validation và soft delete khi mở rộng ứng dụng.

## Git workflow

Kiểm tra trạng thái:

```bash
git status
```

Thêm thay đổi, commit và push lên nhánh `main`:

```bash
git add .
git commit -m "php_update_readme_25/7"
git push origin main
```

Một số mẫu commit message:

```bash
git commit -m "feat: thêm chức năng xóa sản phẩm"
git commit -m "fix: sửa lỗi validation giá sản phẩm"
git commit -m "docs: cập nhật README"
```

## Xử lý lỗi thường gặp

### Chưa có application key

Lỗi: `No application encryption key has been specified`.

```bash
php artisan key:generate
```

### Chưa có bảng database

Lỗi: `no such table`.

```bash
php artisan migrate
```

### Không mở được SQLite database

Đảm bảo file `database/database.sqlite` tồn tại và chạy lại migration.

### CSS hoặc JavaScript không cập nhật

```bash
npm install
npm run build
```

Trong development, có thể dùng:

```bash
npm run dev
```

### Lỗi cache cấu hình

```bash
php artisan optimize:clear
```

### Lỗi quyền ghi trên Linux/macOS

```bash
chmod -R 755 storage bootstrap/cache
```

## Đóng góp

Quy trình đề xuất:

1. Fork repository.
2. Tạo branch mới, ví dụ `feature/product-search`.
3. Thực hiện thay đổi và chạy test.
4. Commit với nội dung rõ ràng.
5. Push branch lên repository.
6. Mở Pull Request.

## Tác giả

**Lê Minh Quân**

- GitHub: [@LeMinh-Quan](https://github.com/LeMinh-Quan)
- Lớp: CĐCNTT24

## Thông tin project

- Laravel: 12
- PHP: 8.2+
- Cập nhật tài liệu: 25/08/2026
