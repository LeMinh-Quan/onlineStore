<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
     public function index()  
    { 
        $viewData = [];
     $viewData["title"] = "Products - Online Store"; 
        $viewData["subtitle"] = "Danh sách sản phẩm.";  
        $viewData["products"] = Product::all();  
        return view('product.index')->with("viewData", $viewData); 
    }

  public function show($id)
  {
    $viewData = [];
    $product = Product::findOrFail($id);
    $viewData["title"] =   $product->getName()." - Online Store"; 
    $viewData["subtitle"] =   $product->getName()." - Thông tin sản phẩm."; 
    $viewData["product"] = $product;
    return view('product.show')->with("viewData", $viewData);
  }
  public function create()
    {
        return view('product.create');
    }

    // Xử lý khi submit form
    public function store(Request $request)
    {
        // Lấy dữ liệu từ form
        $name = $request->input('product_name');
        $price = $request->input('product_price');

        // Biến chứa đường dẫn ảnh
        $imagePath = '';

        // Kiểm tra có upload ảnh hay không
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');

            // Lưu ảnh vào storage/app/public/products
            $imagePath = $file->store('products', 'public');
        }

        // TODO: Lưu dữ liệu vào Database
        // Product::create([
        //     'name' => $name,
        //     'price' => $price,
        //     'image' => $imagePath,
        // ]);

        // Quay lại form và gửi thông báo
        return redirect()
            ->route('products.create')
            ->with('success', "Đã thêm sản phẩm: $name với giá $price VNĐ")
            ->with('image_path', $imagePath);
    }
}